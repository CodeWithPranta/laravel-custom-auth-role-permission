<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostEvent;
use App\Models\User;
use App\Models\Profile;

class WelcomeController extends Controller
{
    public function index() {
        $postEvents = PostEvent::latest()->paginate(6);
        return view('welcome', ['postEvents' => $postEvents]);
    }

    public function allUsers(){
        $users = User::with('profile')->latest()->paginate(5);

        return view('users', ['users' => $users]);
    }
}
