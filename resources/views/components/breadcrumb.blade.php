<nav class="mb-4">
    <ol class="list-reset flex text-gray-500">
        <li>
            <a href="{{ route('shop') }}" class="hover:text-blue-600">Shop</a>
            <span class="mx-2">/</span>
        </li>
        @if($category)
        <li>
            <a href="{{ route('category', ['slug' => $category->slug]) }}" class="hover:text-blue-600">{{ $category->name }}</a>
            <span class="mx-2">/</span>
        </li>
        @endif
        <li>
            <span class="font-bold text-gray-800">{{ $productName }}</span>
        </li>
    </ol>
</nav>
