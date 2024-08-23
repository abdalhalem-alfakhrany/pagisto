<?php

namespace Database\Seeders;

use App\Models\ComponentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComponentType::query()->create(['name' => 'container']);
        ComponentType::query()->create(['name' => 'text']);
        ComponentType::query()->create(['name' => 'image']);
    }
}
