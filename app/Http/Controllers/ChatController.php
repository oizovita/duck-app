<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSend;
use Inertia\Inertia;
use App\Models\Room;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::query()
            ->with('messages')
            ->whereIn('name', auth()->user()->roles()->pluck('name')->toArray())
            ->get();

        return Inertia::render('Chat', [
            'rooms' => $rooms,
            'user' => auth()->user()
        ]);
    }

    public function store(Request $request)
    {
        MessageSend::dispatch($request->get('message'));
    }
}
