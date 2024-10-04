<div class="py-4 px-6">
    <div class="mt-4">
        <h2 class="block text-sm py-4 text-gray-800 font-bold">Categories</h2>
        <a href="{{route('shop')}}" wire:navigate.hover class="block py-2 rounded-full px-4 text-sm text-gray-500 hover:bg-slate-200">All</a>

        @foreach($categories as $category)
        <a href="{{ route('category', ['slug' => $category->slug]) }}" wire:navigate.hover class="block py-2 rounded-full px-4 text-sm text-gray-500 hover:bg-slate-200">
            {{ $category->name }}
        </a>
        @endforeach
    </div>
</div>