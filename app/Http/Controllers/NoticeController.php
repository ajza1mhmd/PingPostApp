<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NoticePublished;

class NoticeController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Whiteboard Editor
    }

    public function display()
    {
        return view('display'); // Live notice board
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = $request->input('message');

        // Broadcast the event to all other users
        broadcast(new NoticePublished($message))->toOthers();
        logger('Broadcasting: ' . $message);

        return redirect()->back()->with('status', 'Notice Published!');
    }
}
