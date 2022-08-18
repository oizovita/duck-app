<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSend;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        MessageSend::dispatch($request->get('message'));
    }
}
