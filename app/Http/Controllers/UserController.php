<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Montrer le formulaire
    public function create() {
        return view('users.register');
    }

    // Créer un nouvel utilisateur
    public function store(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'number' => 'required|numeric|min:1|not_in:0'
        ]);

        // Hash le mot de passe
        $formFields['password'] = bcrypt($formFields['password']);

        // Créer l'utilisateur
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/');
    }

    // Déconnexion
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Montrer le formulaire de connexion
    public function login() {
        return view('users.login');
    }

    // Connecter l'utilisateur
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Identifiants incorrects'])->onlyInput('email');
    }
}
