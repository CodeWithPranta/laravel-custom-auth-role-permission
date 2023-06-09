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
            'phone' => ['required', 'numeric', 'digits:11', Rule::unique('users', 'phone')],
            'father_name' => ['required', 'min:3'],
            'mother_name' => ['required', 'min:3'],
            'password' => ['required', 'confirmed', 'min:8'],
            'is_baruikati' => ['required'],
            'address' => [],
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        //$user->assignRole('user');

        auth()->login($user);

        return redirect('/')->with('message', 'ধন্যবাদ, আপনি সফলভাবে রেজিস্ট্রেশন সম্পন্ন করেছেন।');
    }

    // Create logout option for a user
    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'আপনি সফলভাবে লগআউট হয়েছেন!');
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
        }

        return back()->withErrors(['phone' => 'আপনি ভূল মোবাইল নম্বর অথবা পাসওয়ার্ড প্রদান করেছেন!'])->onlyInput('email');
    }



}
