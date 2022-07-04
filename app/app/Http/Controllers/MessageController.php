<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function addComment(Request $request)
    {
        $message = new Message;

        $message->messageText = $request->messageInput;
        $message->user_id = Auth::user()->id;

        $message->save();

        return redirect()->route('main.page');
    }

    public function delComment($id)
    {
        Message::destroy($id);
        return redirect()->route('main.page');
    }
}
