<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
            'avatar' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'birth_date' => 'nullable|date|before:today',
            'gender' => 'required',
            'blood_group' => 'nullable',
            'profession' => 'required',
            'bio' => 'nullable',
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

                // Create a new instance of Intervention Image
                $image = Image::make($avatar);

                // Compress the image to a maximum size of 800x600 pixels and 75% quality
                $image->resize(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->encode('jpg', 75);

                // Generate a unique file name and save the compressed image to disk
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                Storage::put('public/files/avatars/'.$avatarName, $image->__toString());

                $profile->avatar = $avatarName;
                $profile->save();
            }
        } else {
            $newProfile = $user->profile()->create([
                'birth_date' => $validateData['birth_date'],
                'gender' => $validateData['gender'],
                'blood_group' => $validateData['blood_group'],
                'profession' => $validateData['profession'],
                'bio' => $validateData['bio'],
            ]);

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');

                // Create a new instance of Intervention Image
                $image = Image::make($avatar);

                // Compress the image to a maximum size of 800x600 pixels and 75% quality
                $image->resize(200, 300, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $image->encode('jpg', 75);

                // Generate a unique file name and save the compressed image to disk
                $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                Storage::put('public/files/avatars/'.$avatarName, $image->__toString());

                $newProfile->avatar = $avatarName;
                $newProfile->save();
            }
        }

        return redirect()->route('user.show_profile')->with('message', 'আপনার প্রোফাইল সফলভাবে আপডেট হয়েছে।');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
