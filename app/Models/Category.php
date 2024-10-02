<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Category extends Model
{
    use Sushi;

    protected $rows = [
        [
            'id' => 1,
            'name' => 'Téléphone',
            'slug' => 'telephone',
        ],
        [
            'id' => 2,
            'name' => 'Ordinateur',
            'slug' => 'ordinateur',
        ],
        [
            'id' => 3,
            'name' => 'Food',
            'slug' => 'food',
        ],
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
