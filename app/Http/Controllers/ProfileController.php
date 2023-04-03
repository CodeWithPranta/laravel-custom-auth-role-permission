<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('users.user_profile', compact('user', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('users.profile_edit', compact('user', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile();


        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'phone' => 'required|string|min:11|unique:users,phone,'.$user->id,
            'is_baruikati' => ['required'],
            'address' => [],
            'avatar' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required',
            'blood_group' => 'required',
            'profession' => 'required',
            'bio' => 'required',
        ]);

        // User info update in users table
        $user->update([
            'name' => $validateData['name'],
            'father_name' => $validateData['father_name'],
            'mother_name' => $validateData['mother_name'],
            'phone' => $validateData['phone'],
            'is_baruikati' => $validateData['is_baruikati'],
            'address' => $validateData['address'],
        ]);

        if ($profile->exists) {
            // Remove the old avatar only if a new one has been uploaded
            /**
             * When I tried to change only gender then image was delted auto that's why added
             * $request->hasFile('avatar') && $profile->avatar instead only $profile->avatar
             */
            if ($request->hasFile('avatar') && $profile->avatar) {
                Storage::delete('public/files/avatars/'.$profile->avatar);
            }

            $profile->update([
                'birth_date' => $validateData['birth_date'],
                'gender' => $validateData['gender'],
                'blood_group' => $validateData['blood_group'],
                'profession' => $validateData['profession'],
                'bio' => $validateData['bio'],
            ]);

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->storeAs('public/files/avatars', $avatarName);
                $profile->avatar = $avatarName;
                $profile->save();
            }
        }else{
            $newProfile = $user->profile()->create([
                'birth_date' => $validateData['birth_date'],
                'gender' => $validateData['gender'],
                'blood_group' => $validateData['blood_group'],
                'profession' => $validateData['profession'],
                'bio' => $validateData['bio'],
            ]);

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                $avatar->storeAs('public/files/avatars', $avatarName);
                $newProfile->avatar = $avatarName;
                $newProfile->save();
            }
        }

        return back()->with('message', 'আপনার প্রোফাইল সফলভাবে আপডেট হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
