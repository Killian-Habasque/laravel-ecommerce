<div x-data="{ open: false}" class="relative">
    <button x-on:click="open = ! open" class="flex gap-2 items-center">
        <x-icons :type="'cart'" />
        Cart ({{ $quantity }})
    </button>

    <div x-show="open" x-on:click.outside="open = false" class="absolute bottom-0 right-0 p-4 translate-y-full bg-white shadow-lg w-96 z-50 rounded-lg">
        <ul>
            @forelse($products as $product)
            <li class="flex items-center justify-between py-4 border-b border-slate-200">
                <img class="w-16 h-16 object-cover rounded-lg" src="{{ asset($product->image) }}" alt="{{ $product->name }}">

                <div class="flex flex-col justify-center w-full ml-4">
                    <div class="font-semibold text-gray-800">{{ $product->name }}</div>

                    <div class="flex items-center gap-2 mt-2">
                        <x-counter :product="$product" />
                    </div>
                </div>

                <div class="font-semibold text-gray-900">
                    {{ Number::currency($product->price * $cart[$product->id]['quantity'], 'EUR', 'fr') }}
                </div>
            </li>
            @empty
            <li class="py-8 text-center">Cart is empty</li>
            @endforelse

            <li class="flex items-center justify-between py-4 border-t border-slate-200">
                <div class="font-semibold">Total</div>
                <div class="font-semibold text-gray-900">
                    {{ Number::currency($total, 'EUR', 'fr') }}
                </div>
            </li>
        </ul>
    </div>
</div>