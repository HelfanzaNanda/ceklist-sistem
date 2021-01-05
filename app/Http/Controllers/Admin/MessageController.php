<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:isAdmin');
    }

    public function index()
    {
        return view('pages.admin.message.index', [
            'title' => 'Pesan',
            'message' => Message::first() ?? new Message
        ]);
    }

    public function update(Request $request)
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

        return redirect()->route('admin.message.index')
        ->with('success', 'pesan telah di update');
    }
}
