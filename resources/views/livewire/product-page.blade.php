<div class="h-screen flex flex-col py-8">
    <nav class="mb-4">
        <ol class="list-reset flex text-gray-500">
            <li>
                <a href="{{ route('shop') }}" class="hover:text-blue-600">Shop</a>
                <span class="mx-2">/</span>
            </li>
            @if( $product->category->slug)
            <li>
                <a href="{{ route('category', ['slug' => $product->category->slug ]) }}" class="hover:text-blue-600">{{ $product->category->name }}</a>
                <span class="mx-2">/</span>
            </li>
            @endif
            <li>
                <span class="font-bold text-gray-800">{{ $product->name }}</span>
            </li>
        </ol>
    </nav>

    <div class="w-full mx-auto my-8 p-6 bg-white rounded-lg">

        <div class="flex flex-col md:flex-row items-center gap-16">
            <img class="w-full rounded-lg object-cover" src="{{ asset($product->image) }}" alt="{{ $product->name }}">

            <div class="flex flex-col justify-between w-full">
                <h1 class="text-4xl font-bold text-gray-800 mb-6">{{ $product->name }}</h1>
                <p class="text-gray-600 text-lg mb-4">{{ $product->description }}</p>
                <p class="text-2xl font-semibold text-gray-900 mb-4">Prix: {{ number_format($product->price, 2, ',', ' ') }} €</p>

                @if($product->tags->isNotEmpty())
                <div class="flex flex-wrap gap-2 mb-4">
                    <span class="font-semibold">Tags :</span>
                    @foreach($product->tags as $tag)
                    <span class="bg-gray-200 text-sm rounded-full px-3 py-1">{{ $tag->name }}</span>
                    @endforeach
                </div>
                @endif

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2">
                        <button type="button" class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300"
                            wire:click="decrement({{ $product->id }})">-</button>
                        <div class="w-8 text-center">{{ session('cart.' . $product->id . '.quantity', 0) }}</div>
                        <button type="button" class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-300"
                            wire:click="increment({{ $product->id }})">+</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>