<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonationCallTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('donation_call_types')->insert([
            ['name' => 'SOS'],
            ['name' => 'Construction'],
            ['name' => 'Famine'],
            ['name' => 'Santé'],
            ['name' => 'Éducation'],
            ['name' => 'Environnement'],
            ['name' => 'Secours aux sinistrés'],
            ['name' => 'Soins de santé'],
        ]);
    }
}
