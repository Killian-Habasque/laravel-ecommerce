<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductsList extends Component
{
    public $category = '';

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

    #[On('changeCategory')]
    public function changeCategory($category)
    {
        $this->category = $category;
        $this->dispatch('update-list'); 
    }

    #[On('update-list')]
    public function render()
    {
        $products = collect();

        if ($this->category) {
            // Requête en fonction de category_id
            $category = Category::where('slug', $this->category)->first();
            if ($category) {
                $products = Product::where('category_id', $category->id)->latest()->paginate(10);
            }
        } else {
            $products = Product::latest()->paginate(10);
        }

        return view('livewire.products-list', compact('products'));
    }
}
