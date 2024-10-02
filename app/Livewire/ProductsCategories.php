<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;

class ProductsCategories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.products-categories', [
            'categories' => $this->categories,
        ]);
    }
}