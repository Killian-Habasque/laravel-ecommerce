<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class ProductsList extends Component
{
    public $category = '';
    public $minPrice = 0;
    public $maxPrice = 10000;
    public $searchTerm = ''; 

    public function mount()
    {
        if (request('slug')) {
            $this->category = request('slug');
        }
    }

    public function increment($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $product = Product::find($id);
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        $this->dispatch('update-cart');
    }

    public function decrement($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        $this->dispatch('update-cart');
    }

    public function filterProducts()
    {
        $this->render();
    }

    public function render()
    {
        $products = collect();
     
        if ($this->category) {
            $category = Category::where('slug', $this->category)->first();
            if ($category) {
                $products = Product::where('category_id', $category->id)
                    ->where('price', '>=', $this->minPrice)
                    ->where('price', '<=', $this->maxPrice)
                    ->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->latest()
                    ->paginate(10);
            }
        } else {
            $products = Product::where('price', '>=', $this->minPrice)
                ->where('price', '<=', $this->maxPrice)
                ->where('name', 'like', '%' . $this->searchTerm . '%') 
                ->latest()
                ->paginate(10);
        }

        return view('livewire.products-list', compact('products'));
    }
}
