<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $rooms = [
            'admin',
            'user',
        ];

        collect($rooms)->each(fn($room) => Room::query()->firstOrCreate(['name' => $room]));
    }
}
