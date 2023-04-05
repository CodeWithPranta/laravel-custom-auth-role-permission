<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $chat = new Chat();
        $chat->user_id = $user->id;
        $chat->message = $request->input('message');
        $chat->save();

        broadcast(new ChatMessageSent($chat))->toOthers();

        return response()->json([
            'status' => 'success',
            'message' => 'Message sent.',
        ]);
    }
}
