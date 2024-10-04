<div class="py-4 px-6">
    <div class="mt-4">
        <h2 class="block text-sm py-4 text-gray-800 font-bold flex items-center gap-2">
            <x-icons :type="'categories'" />
            Categories
        </h2>

        <div class="flex flex-col gap-1">
            <a href="{{ route('shop') }}" wire:navigate.hover class="block py-2 rounded-full px-4 text-sm text-gray-500 hover:bg-slate-200 {{ request()->is('/') ? 'bg-slate-200 text-gray-800 font-bold' : 'text-gray-500 hover:bg-slate-200' }}">All</a>
            @foreach($categories as $category)
            <a href="{{ route('category', ['slug' => $category->slug]) }}"
                wire:navigate.hover
                class="block py-2 rounded-full px-4 text-sm {{ request()->is('category/' . $category->slug) ? 'bg-slate-200 text-gray-800 font-bold' : 'text-gray-500 hover:bg-slate-200' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>

    </div>
</div>