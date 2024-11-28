<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {
    public function index() {
        return view('content.chat.index');
    }


    public function sendMessage(Request $request) {
        // $user = Auth::user()->id;
        $user = 1;
        $message = $request->input('message');

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['status' => 'Message sent!']);
    }

}
