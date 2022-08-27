<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $user = User::query()->firstOrCreate([
            'email' => 'admin@duck.app',
            'password' => Hash::make('duck'),
            'name' => 'Duck Admin',
        ]);
        $user->assignRole('admin', 'user');
    }
}
