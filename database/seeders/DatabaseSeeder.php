<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProfileSeeder;
use Database\Seeders\DonationSeeder;
use Database\Seeders\DonationCallSeeder;
use Database\Seeders\AssociationEventSeeder;
use Database\Seeders\DonationCallTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            AssociationEventSeeder::class,
            DonationCallTypeSeeder::class,
            DonationCallSeeder::class,
            DonationSeeder::class,
        ]);
    }
}
