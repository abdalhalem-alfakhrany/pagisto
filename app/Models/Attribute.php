<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'attributables');
    }

    // public function attachables()
    // {
    //     return $this->morphedByMany(Page::class, 'attributables');
    // }
}
