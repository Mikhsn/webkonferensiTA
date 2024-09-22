<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembershipPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('membershipprices')->insert([
            [
                'price' => 100000, // Contoh harga untuk upgrade
                'membership_type' => 'Upgrade User to Member',
            ],
        ]);
    }
}
