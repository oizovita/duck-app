<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('admin', function (User $user) {
    return $user->hasRole('admin');
}, ['guards' => ['web']]);

Broadcast::channel('user', function (User $user) {
    return $user->hasRole('user') or $user->hasRole('admin');
}, ['guards' => ['web']]);
