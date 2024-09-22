<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Ihsan',
            'email' => 'mihsan@localhost',
            'password' => bcrypt('admin'),
            'confirm_password' => bcrypt('admin'),
            'role_id' => 1,
            'organization' => 'Admin',
            'address' => 'Admin',
            'phone' => '083167714417',
            'city' => 'Padang',
            'country' => 'Indonesia',

        ]);
    }
}
