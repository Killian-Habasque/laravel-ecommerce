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

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
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
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        
        $total = $products->sum(function ($product) use ($cart) {
            return $product->price * $cart[$product->id]['quantity'];
        });

        $quantity = collect($cart)->sum('quantity');

        return view('livewire.cart', compact('cart', 'products', 'total', 'quantity'));
    }
}
