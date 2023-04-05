<?php

namespace App\Http\Controllers;

use App\Models\PostEvent;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = auth()->user()->id;
        // Or $id = Auth::id();

        $postEvents = PostEvent::where('user_id', $id)->latest()->paginate(6);

        return view('users.events.index', ['postEvents' => $postEvents]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $postEvents = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('post_events', 'title')],
            'description' => ['required', 'string', 'max:500'],
        ]);

        // Retrieve the authenticated user ID
        $userID = auth()->user()->id;
        $postEvents['user_id'] = $userID;

        PostEvent::create($postEvents);

        return redirect()->route('events.index')->with('message', 'আপনার ইভেন্ট পোস্টটি সফলভাবে ক্রিয়েট হয়েছে।');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostEvent $postEvent)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $postEvent = PostEvent::find($id);
        return view('users.events.edit', compact('postEvent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $postEvent = PostEvent::find($id);

        if (Auth::user()->id !== $postEvent->user_id){
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('post_events', 'title')->ignore($postEvent)],
            'description' => ['required', 'string', 'max:500'],
        ]);

        //$validatedData['user_id'] = Auth::user()->id;

        $postEvent->update($validatedData);

        return redirect()->route('events.index')->with('message', 'আপনার ইভেন্ট পোস্টটি সফলভাবে আপডেট হয়েছে।');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $postEvent = PostEvent::find($id);
        $postEvent->delete($postEvent);

        return redirect()->route('events.index')->with('message', 'আপনার ইভেন্ট পোস্টটি সফলভাবে ডিলিট হয়েছে।');
    }
}
