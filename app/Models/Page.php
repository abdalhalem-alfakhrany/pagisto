<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = false;

    public function components()
    {
        return $this->morphMany(Component::class, 'componentable');
    }

    public function attributes()
    {
        return $this->morphToMany(Attribute::class, 'attributables')->withPivot(['value']);
    }

    public function getTreeAttribute()
    {
        if ($this->components()->exists()) {
            return $this->components->map(function ($component) {
                return [
                    $component->type->name => [
                        'attributes' => $this->attributes()->get()->pluck('pivot.value', 'name')->toArray(),
                        'children' => $component->tree
                    ]
                ];
            })->first();
        } else {
            return [];
        }
    }
}
