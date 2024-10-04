<div>
    @if($tags->isNotEmpty())
    <div class="text-sm text-gray-500">
        <span class="font-semibold">Tags :</span>
        @foreach($tags as $tag)
        <span class="bg-gray-200 rounded-full px-2 py-1">{{ $tag->name }}</span>
        @endforeach
    </div>
    @endif
</div>