<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AttributesSeeder::class,
            ComponentTypeSeeder::class,
            ComponentSeeder::class,
            PageSeeder::class,
        ]);
    }
}
