<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;

class ProductsTags extends Component
{
    public $tags;
    public $selectedTags = [];

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function updatedSelectedTags()
    {
        $this->dispatch('filter-tags', ['selectedTags' => $this->selectedTags]);
    }

    public function render()
    {
        return view('livewire.products-tags', [
            'tags' => $this->tags,
        ]);
    }
}
