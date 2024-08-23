<?php

use App\Models\Component;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

function component_components($component)
{
    if ($component->components()->exists()) {
        foreach ($component->components as $child_component) {
            return [
                $component->type->name => [
                    'attributes' => $component->attributes->pluck('pivot.value', 'name')->toArray(),
                    'children' => component_components($child_component)
                ]
            ];
        }
    } else
        return [
            $component->type->name => [
                'attributes' => $component->attributes->pluck('pivot.value', 'name')->toArray(),
            ]
        ];
}

Route::get('/', function () {
    $page = Page::find(1);
    return component_components($page->components()->first());
    // dump(Component::find(1)->tree);
});
