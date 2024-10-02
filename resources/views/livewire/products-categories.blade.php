<nav class="w-64 bg-white border-r border-slate-200">
    <div class="py-4 px-6">
        <div class="text-lg font-bold">Navigation</div>
        <div class="mt-4">
            <a href="{{route('shop')}}" wire:navigate.hover class="block py-2 text-gray-600 hover:bg-slate-200">Home</a>

            @foreach($categories as $category)
                <a href="{{ route('category', ['slug' => $category->slug]) }}" wire:navigate.hover class="block py-2 text-gray-600 hover:bg-slate-200">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
