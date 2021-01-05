<?php

namespace App\Http\Controllers\OB;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:isOb');
    }

    public function index()
    {
        return view('pages.ob.message.index', [
            'title' => 'Pesan',
            'm' => Message::first() ?? new Message
        ]);
    }

    public function update(Request $request, Message $message)
    {
        $this->validate($request, [
            'body' => ['required'],
        ]);
        $message = Message::first();
        if ($message) {
            $message->update([
                'body' => $request->body
            ]);
        }else{
            Message::create([
                'body' => $request->body
            ]);
        }
        return redirect()->route('ob.mesage.index')
        ->with('success', 'pesan telah di update');
    }
}
