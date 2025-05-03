<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NoticePublished; // Event we'll create

class NoticeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
        ]);

        // Fire a websocket event
        broadcast(new NoticePublished($request->message))->toOthers();

        return redirect()->back()->with('status', 'Notice Published');
    }
}
