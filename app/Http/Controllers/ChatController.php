<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($message,$to_user_id){
        Chat::create([
            'to_user_id' => $to_user_id,
            'from_user_id' => Auth::user()->id,
            'message' => $message
        ]);
        return "mesaj başarıyla gönderildi";
    }

    public function mesajAt(Request $request, $to_user_id){
        $chat = new Chat();
        $chat->from_user_id = Auth::user()->id();
        $chat->to_user_id = $to_user_id;
    }

    public function mesajlar(){
      $message = Chat::where('to_user_id', '=', Auth::user()->id)->get();
        return view('messages.mesajlarım',compact('message'));
    }
}
