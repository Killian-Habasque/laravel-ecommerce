<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;

class Cart extends Component
{

    public function increment($id)
    {
        $cart = session('cart', []);

        $product = Product::find($id);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);
        $this->dispatch('update-list');
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
        $this->dispatch('update-list');
    }

    #[On('update-cart')]
    public function render()
    {
        $cart = session('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
        $quantity = collect($cart)->sum('quantity');

        return view('livewire.cart', compact('cart', 'products', 'total', 'quantity'));
    }
}
