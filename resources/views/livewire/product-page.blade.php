<div class="h-screen flex flex-col">
    <x-breadcrumb :category="$product->category ?? null" :productName="$product->name" />

    <div class="w-full mx-auto my-8 p-6 bg-white rounded-lg">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <img class="w-full rounded-lg object-cover" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <div class="flex flex-col justify-between w-full gap-6">
                <h1 class="text-4xl font-bold text-gray-800">{{ $product->name }}</h1>
                <x-tags :tags="$product->tags" />
                <p class="text-gray-600 text-lg mb-4">{{ $product->description }}</p>
                <x-price :price="$product->price" />

                <div class="flex items-center justify-between">
                    <x-counter :product="$product" />
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mx-auto my-8 p-8 bg-white rounded-lg pb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Similar products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($similarProducts as $similarProduct)
            <div class="border rounded-lg p-4">
                <a href="{{ route('product', $similarProduct->slug) }}">
                    <img class="w-full h-40 object-cover rounded-lg mb-4" src="{{ asset($similarProduct->image) }}" alt="{{ $similarProduct->name }}">
                    <div class="flex flex-col gap-2">
                        <x-tags :tags="$similarProduct->tags" />
                        <h3 class="text-lg font-semibold text-gray-800">{{ $similarProduct->name }}</h3>
                        <x-price :price="$product->price" />
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>