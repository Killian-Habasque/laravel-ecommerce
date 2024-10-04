<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'image', 'category_id'];

    protected $casts = [
        'tags_id' => 'array'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
