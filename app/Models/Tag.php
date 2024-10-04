<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
