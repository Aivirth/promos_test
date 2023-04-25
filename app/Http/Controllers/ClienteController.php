<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteSettoriPivot;
use App\Models\Settore;
use App\Models\Tipo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ClienteController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $this->isUserAdmin();
        $clienti = Cliente::with(['tipo', 'settori', 'user'])->get()->toArray();
        return view('clienti.index',
            [
                'clienti' => $clienti,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $this->isUserAdmin();
        return view('clienti.create',
            [
                'settori' => Settore::all()->toArray(),
                'tipi'    => Tipo::all()->toArray(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
        // dd($request->all());
        $this->isUserAdmin();
        //todo: move to custom request validation class
        $formFields = $request->validate([
            'ragione_sociale'     => ['required', Rule::unique('clienti')],
            'username'            => 'required',
            'password'            => 'required',
            'tipo'                => 'required',
            'email'               => ['required', 'email'],
            'settore_informatica' => 'nullable',
            'settore_immobiliare' => 'nullable',
            'settore_edilizia'    => 'nullable',
            'settore_salute'      => 'nullable',
            'settore_finanza'     => 'nullable',
            'indirizzo'           => 'required',
            'inizio_attivita'     => 'required',
            'partita_iva'         => 'required',
            'codice_fiscale'      => 'nullable',
            'telefono'            => 'required',
            'note'                => 'nullable',
            'rating'              => ['required', 'integer', 'between:0,10'],
            'visura_camerale'     => [File::types(['pdf'])],
        ]);

        //Format data array to create new cliente
        //Add default required fields
        $clienteFields = [
            'ragione_sociale' => $formFields['ragione_sociale'],
            'tipi_id'         => (int) $formFields['tipo'],
            'indirizzo'       => $formFields['indirizzo'],
            'inizio_attivita' => $formFields['inizio_attivita'],
            'piva'            => $formFields['partita_iva'],
            'telefono'        => $formFields['telefono'],
            'rating'          => $formFields['rating'],
        ];

        //Check and Add optional fields
        if (isset($formFields['note'])) {
            $clienteFields['note'] = $formFields['note'];
        }
        if (isset($formFields['codice_fiscale'])) {
            $clienteFields['cf'] = $formFields['codice_fiscale'];
        }

        //Check if visura attachment is present
        if ($request->hasFile('visura_camerale')) {
            if (isset($formFields['visura_camerale'])) {
                $clienteFields['attach_visura_camerale'] = $request->file('visura_camerale')->store('visure_camerali');
            }
        }

        $userFields = [
            'password' => Hash::make($formFields['password']),
            'username' => $formFields['username'],
            'email'    => $formFields['email'],
        ];

        // dd($userFields);

        //create user
        $user = User::create($userFields);

        //Add user_id to cliente
        $userFields['user_id'] = $user->id;

        //Create cliente
        $cliente = Cliente::create($clienteFields);

        //Run checks on selected settori
        $selectedSettori = [];

        $settoriWhitelist = [
            'settore_informatica',
            'settore_immobiliare',
            'settore_edilizia',
            'settore_salute',
            'settore_finanza',
        ];

        foreach ($settoriWhitelist as $settore) {

            if (isset($formFields[$settore])) {
                ('clienti_id');
                ('settori_id');
                $selectedSettori[] = [
                    'clienti_id' => $cliente->id,
                    'settori_id' => (int) $formFields[$settore],
                ];
            }
        }

        //Create cliente - settore relationship
        ClienteSettoriPivot::insert($selectedSettori);

        return redirect()->route('all_clienti')->with('message', 'Utente creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {

        $this->isUserAuthorized($id);
        $cliente = Cliente::where(
            'user_id', '=', $id
        )->with(['tipo', 'settori', 'user'])->get()->toArray();

        // dd($cliente);
        if ($cliente) {
            return view('clienti.show', [
                'cliente' => $cliente[0],
            ]);
        } else {
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $this->isUserAuthorized($id);
        $cliente = Cliente::where(
            'user_id', '=', $id
        )->with(['tipo', 'settori', 'user'])->first()->toArray();

        if ($cliente) {

            //Reformat settori to allow easier already checked value
            $settoriReorderedById = [];
            foreach ($cliente['settori'] as $settore) {
                $settoriReorderedById[$settore['id']] = $settore;
            }
            $cliente['settori'] = $settoriReorderedById;
            // dd($cliente);

            return view('clienti.edit', [
                'cliente' => $cliente,
                'settori' => Settore::all()->toArray(),
                'tipi'    => Tipo::all()->toArray(),
            ]);
        } else {
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $this->isUserAuthorized($id);
        $formFields = $request->validate([
            'ragione_sociale'     => ['required'],
            'username'            => 'required',
            'old_password'        => ['nullable', 'string'],
            'new_password'        => ['nullable', 'string'],
            'tipo'                => 'required',
            'email'               => ['required', 'email'],
            'settore_informatica' => 'nullable',
            'settore_immobiliare' => 'nullable',
            'settore_edilizia'    => 'nullable',
            'settore_salute'      => 'nullable',
            'settore_finanza'     => 'nullable',
            'indirizzo'           => 'required',
            'inizio_attivita'     => 'required',
            'partita_iva'         => 'required',
            'codice_fiscale'      => 'nullable',
            'telefono'            => 'required',
            'note'                => 'nullable',
            'rating'              => ['required', 'integer', 'between:0,10'],
            'visura_camerale'     => [File::types(['pdf'])],
        ]);

        /**
         * Define an array of warning messages
         */
        $responseWarnings = [];

        //Format data array to create new cliente
        //Add default required fields
        $clienteFields = [
            'ragione_sociale' => $formFields['ragione_sociale'],
            'tipi_id'         => (int) $formFields['tipo'],
            'indirizzo'       => $formFields['indirizzo'],
            'inizio_attivita' => $formFields['inizio_attivita'],
            'piva'            => $formFields['partita_iva'],
            'telefono'        => $formFields['telefono'],
            'rating'          => $formFields['rating'],
        ];

        //Check and Add optional fields
        if (isset($formFields['note'])) {
            $clienteFields['note'] = $formFields['note'];
        }
        if (isset($formFields['codice_fiscale'])) {
            $clienteFields['cf'] = $formFields['codice_fiscale'];
        }

        //Check if visura attachment is present
        if ($request->hasFile('visura_camerale')) {
            if (isset($formFields['visura_camerale'])) {
                $clienteFields['attach_visura_camerale'] = $request->file('visura_camerale')->store('visure_camerali');
            }
        }

        $userFields = [
            'username' => $formFields['username'],
            'email'    => $formFields['email'],
        ];
        //Get user to update
        $user = User::find($id);

        //Check if old password is correct
        if (trim($formFields['old_password']) != '') {
            if (Hash::check($formFields['old_password'], $user->password)) {
                //update password
                $userFields['password'] = Hash::make($formFields['new_password']);
            } else {
                $responseWarnings[] = 'Password non aggiornata in quanto non combacia con la attuale';
            }
        }

        //Get Cliente to update
        $cliente = Cliente::where('user_id', '=', $user->id)->first();

        // dd($user->id, $cliente->ragione_sociale);
        // dd($cliente->get()->toArray());
        //Update user
        $user->update($userFields);

        
        //Delete older attachment file from storage
        if ($request->hasFile('visura_camerale')) {
            if (!is_null($cliente->attach_visura_camerale)) {
                Storage::disk('local')->delete($cliente->attach_visura_camerale);
            }
        }

        //Update cliente
        $cliente->update($clienteFields);

        //Run checks on selected settori
        $selectedSettori = [];

        $settoriWhitelist = [
            'settore_informatica',
            'settore_immobiliare',
            'settore_edilizia',
            'settore_salute',
            'settore_finanza',
        ];

        foreach ($settoriWhitelist as $settore) {

            if (isset($formFields[$settore])) {
                ('clienti_id');
                ('settori_id');
                $selectedSettori[] = [
                    'clienti_id' => $cliente->id,
                    'settori_id' => (int) $formFields[$settore],
                ];
            }
        }

        //Get all ClienteSettoriPivot
        $clientiSettoriPivots = ClienteSettoriPivot::where('clienti_id', '=', $cliente->id);

        //Delete all current relationships
        $clientiSettoriPivots->delete();

        //Recreate cliente - settore relationship
        ClienteSettoriPivot::insert($selectedSettori);

        return redirect()->route('edit_cliente', ['id' => $user->id])
            ->with('message', 'Utente modificato con successo')
            ->with('warnings', $responseWarnings);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $this->isUserAuthorized($id);
        //Get user to delete
        $user = User::find($id);

        $cliente = Cliente::where(
            'user_id', '=', $user->id
        )->first();

        // dd($user, $cliente);

        //Delete visura camerale
        if (!is_null($cliente->attach_visura_camerale)) {
            Storage::disk('local')->delete($cliente->attach_visura_camerale);
        }

        //Delete Cliente
        $cliente->delete();

        //Delete user
        $user->delete();

        return redirect()->route('all_clienti')
            ->with('message', 'Utente Eliminato con successo');
    }
}
