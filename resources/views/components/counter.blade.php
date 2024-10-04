<div class="flex items-center gap-1 flex-nowrap">
    <button type="button" class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300" wire:click="decrement({{ $product->id }})">-</button>
    <div class="w-8 text-center">{{ session('cart.' . $product->id . '.quantity', 0) }}</div>
    <button type="button" class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300" wire:click="increment({{ $product->id }})">+</button>
</div>