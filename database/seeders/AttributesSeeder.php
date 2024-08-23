<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::query()->create(['name' => 'id']);

        Attribute::query()->create(['name' => 'title']);
        Attribute::query()->create(['name' => 'lang']);

        Attribute::query()->create(['name' => 'bg-color']);

        Attribute::query()->create(['name' => 'text-color']);
        Attribute::query()->create(['name' => 'text-size']);

        Attribute::query()->create(['name' => 'src']);
    }
}
