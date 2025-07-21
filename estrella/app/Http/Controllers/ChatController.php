<?php

namespace App\Http\Controllers;

use App\Mail\ChatMessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $user = $request->user();
        $message = $request->input('message');

        Mail::to('admin@example.com')->send(new ChatMessageReceived($user, $message));

        return back();
    }
}
