<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Component;
use App\Models\ComponentType;
use Illuminate\Database\Seeder;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $container = Component::query()->create([
        //     'component_type_id' => ComponentType::where('name', 'container')->first()->id
        // ]);

        // $container->attributes()->syncWithPivotValues(Attribute::query()->where('name', 'bg-color')->first(), ['value' => 'red']);
        // $container->attributes()->syncWithPivotValues(Attribute::query()->where('name', 'id')->first(), ['value' => 'container1']);

        // $container2 = $container->components()->create([
        //     'component_type_id' => ComponentType::where('name', 'container')->first()->id
        // ]);
        // $container2->attributes()->syncWithPivotValues(Attribute::query()->where('name', 'id')->first(), ['value' => 'container2']);

        // $text = $container2->components()->create([
        //     'component_type_id' => ComponentType::where('name', 'text')->first()->id
        // ]);
        // $text->attributes()->syncWithPivotValues(Attribute::query()->where('name', 'id')->first(), ['value' => 'text1']);

        $containerType = ComponentType::where('name', 'container')->first()->id;
        $textType = ComponentType::where('name', 'text')->first()->id;
        $imageType = ComponentType::where('name', 'image')->first()->id;

        $blogCardContainer = Component::query()->create(['component_type_id' => $containerType]);

        $blogTitle = $blogCardContainer->children()->create(['component_type_id' => $textType]);
        $blogTitle->attributes()->syncWithPivotValues(Attribute::where('name', 'text-size')->first(), ['value' => '40px']);

        $blogDescription = $blogCardContainer->children()->create(['component_type_id' => $textType]);
        $blogDescription->attributes()->syncWithPivotValues(Attribute::where('name', 'text-size')->first(), ['value' => '10px']);

        $blogThumbnail = $blogCardContainer->children()->create(['component_type_id' => $imageType]);
        $blogThumbnail->attributes()->syncWithPivotValues(Attribute::where('name', 'src')->first(), ['value' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDIXrklgwGnvaUE9I2HnA6q__WqyXz0m6_AQ&s']);
    }
}
