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
        // User::create([
        //     'name' => 'Carlo Andres Arevalo',
        //     'email' => 'carevalo@nexura.com',
        //     'password' => Hash::make(12345678)
        // ]);

        // autentic::create([
        //     'user_id'=>1,
        //     'identifier'=>1144170160,
        //     'expeditionDate'=>1310515200,
        //     'phone'=>3177864344,
        //     'birthdayDate'=>738028800
        // ]);
    }
}
