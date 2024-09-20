<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Product extends Model
{
    use Sushi;

    protected $rows = [
        [
            'id' => 1,
            'name' => 'Iphone 16',
            'price' => 799,
            'category' => 'telephone'
        ],
        [
            'id' => 2,
            'name' => 'Iphone 14',
            'price' => 749,
            'category' => 'telephone'
        ],
        [
            'id' => 3,
            'name' => 'MacBook Pro',
            'price' => 1869,
            'category' => 'ordinateur'
        ],
        [
            'id' => 4,
            'name' => 'Pomme',
            'price' => 0.49,
            'category' => 'food'
        ],
    ];
}
