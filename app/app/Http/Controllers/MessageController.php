<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function addComment(Request $request)
    {
        Message::where('user_id',Auth::user()->id)->increment('position');

        $message = new Message;

        $message->messageText = $request->messageInput;
        $message->user_id = Auth::user()->id;

        $message->save();

        return redirect()->route('main.page');
    }

    public function delComment($id)
    {
        $message = Message::find($id);
        Message::where('position','>',$message->position)->decrement('position');
        Message::destroy($id);
        return redirect()->route('main.page');
    }

    public function upComment($id)
    {
        return redirect()->route('main.page');
    }

    public function downComment($id)
    {
        return redirect()->route('main.page');
    }
}
