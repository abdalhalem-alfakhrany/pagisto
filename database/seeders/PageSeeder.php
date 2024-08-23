<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Component;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $page = Page::create([]);
        $page->attributes()->attach([
            Attribute::where('name', 'title')->first()->id => ['value' => 'page 1'],
            Attribute::where('name', 'lang')->first()->id => ['value' => 'ar'],
            Attribute::where('name', 'id')->first()->id => ['value' => 'page1']
        ]);
        $page->components()->save(Component::find(1));
    }
}
