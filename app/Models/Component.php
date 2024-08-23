<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;

class Component extends Model
{
    public $timestamps = false;
    protected $fillable = ['component_type_id'];

    public function type()
    {
        return $this->belongsTo(ComponentType::class, 'component_type_id');
    }

    public function data()
    {
        return $this->belongsTo(ComponentData::class);
    }

    public function componentable()
    {
        return $this->morphedByMany(Component::class, 'componentable');
    }

    public function pageabele()
    {
        return $this->morphTo();
    }

    public function components()
    {
        return $this->morphMany(Component::class, 'componentable');
    }

    public function attributes()
    {
        return $this->morphToMany(Attribute::class, 'attributables')->withPivot(['value']);
    }

    // public function getTreeAttribute()
    // {
    //     if ($this->children()->exists()) {
    //         $components = [];
    //         $this->children->each(function ($component) use (&$components) {
    //             $components[$component->type->name]['attributes'] = $component->attributes()->get()->pluck('pivot.value', 'name')->toArray();
    //             if ($component->children()->exists())
    //                 $components[$component->type->name]['children'] = $component->tree;
    //             else
    //                 continue;
    //         });
    //         return $components;
    //     } else {
    //         return [
    //             $this->type->name => [
    //                 'attributes' => $this->attributes()->get()->pluck('pivot.value', 'name')->toArray(),
    //             ]
    //         ];
    //     }
    // }
}
