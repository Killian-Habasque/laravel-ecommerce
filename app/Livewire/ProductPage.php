<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductPage extends Component
{
    public $product;
    public $similarProducts;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();

        $this->similarProducts = Product::where('category_id', $this->product->category_id)
        ->where('id', '!=', $this->product->id)  
        ->take(3)
        ->get();
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

    public function render()
    {
        return view('livewire.product-page', [
            'product' => $this->product,
            'similarProducts' => $this->similarProducts,
        ]);
    }
}
