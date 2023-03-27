<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use Illuminate\Http\Request;
use App\Rules\PhoneExistsForPasswordReset;


class PasswordResetController extends Controller
{
     // Password reset
     public function password_reset() {
        return view('users.password_reset');
    }

    public function send_password_reset_request(Request $request) {
        $formFields = $request->validate([
            'phone' => ['required', 'min:11', new PhoneExistsForPasswordReset],
        ]);

        PasswordReset::create($formFields);

        return redirect('/')->with('message', 'আপনার নতুন পাসওয়ার্ড পাওয়ার আবেদনটি গ্রহন করা হয়েছে');
    }

}
