<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    // Show Register/Create Form
    public function create() {
        // return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        // $formFields = $request->validate([
        //     'username' => ['required', 'min:3'],
        //     'email'    => ['required', 'email', Rule::unique('users', 'email')],
        //     'password' => 'required|confirmed|min:6',
        // ]);

        // // Hash Password
        // $formFields['password'] = bcrypt($formFields['password']);

        // // Create User
        // $user = User::create($formFields);

        // // Login
        // auth()->login($user);

        // return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('message', 'Hai effettuato il logout');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email'    => ['required', 'email'],
            'password' => 'required'
        ]);

        $formFields['is_active'] = 1;

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('message', 'Benvenuto ' . auth()->user()->username . '!');
        }

        return back()->withErrors(['email' => 'Credenziali non valide'])->onlyInput('email');
    }
}