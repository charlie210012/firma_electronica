<?php

namespace Database\Seeders;

use App\Models\autentic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Camilo Valencia',
            'email' => 'cvalencia@nexura.com',
            'password' => Hash::make(12345678),
            'client_id'=>0,
            'business_id'=>0
        ]);

    }
}
