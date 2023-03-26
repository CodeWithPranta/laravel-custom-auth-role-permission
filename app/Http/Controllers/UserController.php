<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show register form for user
    public function create() {
        return view('users.create');
    }

    // Create a new user by request helper
    public function register(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'phone' => ['required', Rule::unique('users', 'phone')],
            'father_name' => ['required', 'min:3'],
            'mother_name' => ['required', 'min:3'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'Registration successful! You\'re logged in!');
    }

    // Create logout option for a user
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You\'re logged out successfully!');
    }

    // Show login form
    public function login() {
        return view('users.login');
    }

    // Using authenticate method to logged in
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'phone' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)){
            $request->session()->regenerate();

            return view('users.dashboard');
        }

        return back()->withErrors(['phone' => 'Your mobile or password or both not match!'])->onlyInput('email');
    }
}
