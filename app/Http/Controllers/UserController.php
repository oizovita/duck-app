<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\User;
use App\Events\MessageSend;

class UserController extends Controller
{
    public function index()
    {
        broadcast(new MessageSend('test'))->toOthers();

        return Inertia::render('Users', [
            'users' => User::query()->with('roles')->paginate(5),
        ]);
    }
}
