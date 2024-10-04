<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductsList extends Component
{
    public $category = '';
    public $minPrice = 0;
    public $maxPrice = 1000;
    public $searchTerm = ''; 
    public $selectedTags = [];

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

    #[On('filter-tags')]
    public function filterByTags($data)
    {
        $this->selectedTags = $data['selectedTags'];
        $this->filterProducts();
    }
    public function filterProducts()
    {
        $this->render();
    }

    public function render()
    {
        $products = collect();

        $query = Product::query()
            ->where('price', '>=', $this->minPrice)
            ->where('price', '<=', $this->maxPrice)
            ->where('name', 'like', '%' . $this->searchTerm . '%');
        
        if ($this->category) {
            $category = Category::where('slug', $this->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }
        
        if (!empty($this->selectedTags)) {
            $query->whereHas('tags', function ($q) {
                $q->whereIn('id', $this->selectedTags);
            });
        }
        
        $products = $query->latest()->paginate(12);
        
        return view('livewire.products-list', compact('products'));
    }
}
