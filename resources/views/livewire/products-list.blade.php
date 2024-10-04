<div>
    <h2 class="text-lg mb-4">Filtrer par prix</h2>
    <div class="flex mb-4">
        <input type="number" wire:model="minPrice" placeholder="Prix min" class="border rounded px-2 py-1">
        <span class="mx-2">à</span>
        <input type="number" wire:model="maxPrice" placeholder="Prix max" class="border rounded px-2 py-1">
        <button type="button" wire:click="filterProducts" class="ml-2 bg-blue-500 text-white rounded px-2">Filtrer</button>
    </div>

    <h2 class="text-lg mb-4">Rechercher un produit</h2>
    <div class="flex mb-4">
        <input type="text" wire:model.defer="searchTerm" placeholder="Rechercher..." class="border rounded px-2 py-1">
        <button type="button" wire:click="filterProducts" class="ml-2 bg-blue-500 text-white rounded px-2">Rechercher</button>
    </div>

    <ul class="grid grid-cols-4 gap-8">
        @foreach ($products as $product)
        <li class="flex flex-col justify-between space-y-6 bg-white rounded-lg shadow p-4">
            <div class="space-y-2">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-lg">
                <h2 class="text-lg">{{ $product->name }}</h2>

                @if($product->tags->isNotEmpty())
                    <div class="text-sm text-gray-500">
                        <span class="font-semibold">Tags :</span>
                        @foreach($product->tags as $tag)
                            <span class="bg-gray-200 rounded-full px-2 py-1">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex items-center justify-between">
                <div>
                    {{ number_format($product->price, 2, ',', ' ') }} €
                </div>
                <div class="flex items-center gap-1 flex-nowrap">
                    <button type="button" class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300" wire:click="decrement({{ $product->id }})">-</button>
                    <div class="w-8 text-center">{{ session('cart.' . $product->id . '.quantity', 0) }}</div>
                    <button type="button" class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300" wire:click="increment({{ $product->id }})">+</button>
                </div>
            </div>

            <a href="{{ route('product', ['slug' => $product->slug]) }}" wire:navigate.hover class="bg-blue-500 text-white rounded ">
                Voir plus
            </a>
        </li>
        @endforeach
    </ul>
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
