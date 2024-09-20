<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductsCategories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Product::distinct()->pluck('category');
    }

    public function render()
    {
        return view('livewire.products-categories', [
            'categories' => $this->categories,
        ]);
    }
}
