<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteSettoriPivot;
use App\Models\Settore;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ClienteController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $clienti = Cliente::with(['tipo', 'settori'])->get()->toArray();
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
            'password'        => Hash::make($formFields['password']),
            'tipi_id'         => (int) $formFields['tipo'],
            'email'           => $formFields['email'],
            'username'        => $formFields['username'],
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
        $clienteSettoriPivot = ClienteSettoriPivot::insert($selectedSettori);


        return redirect()->route('dashboard.home')->with('message', 'Utente creato con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {


        $cliente = Cliente::where('id', '=', $id)->with(['tipo', 'settori'])->get()->toArray()[0];

        if ($cliente) {
            return view('clienti.show', [
                'cliente' => $cliente,
            ]);
        } else {
            abort('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
