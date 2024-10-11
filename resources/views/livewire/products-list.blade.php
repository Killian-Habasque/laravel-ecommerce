<div>
    <h2 class="text-sm flex text-gray-500 py-4">Filtrer par prix</h2>
    <div class="flex">
        <input type="number" wire:model="minPrice" placeholder="Prix min" class="border rounded px-2 py-1">
        <span class="mx-2">à</span>
        <input type="number" wire:model="maxPrice" placeholder="Prix max" class="border rounded px-2 py-1">
        <button type="button" wire:click="filterProducts" class="ml-2 bg-blue-500 text-white rounded px-2">Filtrer</button>
    </div>

    <h2 class="text-sm flex text-gray-500 py-4">Rechercher un produit</h2>
    <div class="flex mb-4">
        <input type="text" wire:model.defer="searchTerm" placeholder="Rechercher..." class="border rounded px-2 py-1">
        <button type="button" wire:click="filterProducts" class="ml-2 bg-blue-500 text-white rounded px-2">Rechercher</button>
    </div>

    <ul data-testid="products-list" class="grid grid-cols-4 gap-8 pt-8">
        @if ($products->isEmpty())
        <li class="flex flex-col justify-center items-center col-span-4 bg-gray-100 rounded-lg p-4">
            <p class="text-sm flex gap-2 text-gray-500">
                <x-icons :type="'alert'" />
                Aucun produit trouvé.
            </p>
        </li>
        @else
        @foreach ($products as $product)
        <li class="flex flex-col justify-between space-y-6 bg-white rounded-lg shadow p-4 transition-all duration-300 transform hover:scale-105">
            <div class="space-y-2">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded-lg">
                <h2 class="text-lg">{{ $product->name }}</h2>
                <x-tags :tags="$product->tags" />
            </div>

            <div class="flex items-center justify-between">
                <x-price :price="$product->price" />
                <x-counter :product="$product" />
            </div>

            <a href="{{ route('product', ['slug' => $product->slug]) }}"
                wire:navigate.hover
                class="bg-blue-500 text-white rounded-lg px-6 py-2 hover:bg-blue-600 hover:shadow-lg">
                Show more
            </a>
        </li>
        @endforeach
        @endif
    </ul>
    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>