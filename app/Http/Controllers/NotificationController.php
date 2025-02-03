<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;

class NotificationController extends Controller {
    public function test(Request $request) {
        // $channel = $request->input('channel');
        // $message = $request->input('message');
    
        // // Broadcast the event
        // broadcast(new NewMessage($channel, $message))->toOthers();
    
        return response()->json(['status' => 'Message sent']);
    }

}
