<div class="py-4 px-6">
    <div class="mt-4">
        <h2 class="block text-sm py-4 text-gray-800 font-bold">Tags</h2>

        @foreach($tags as $tag)
        <label class="flex items-center py-2">
            <input type="checkbox" wire:model.live="selectedTags" value="{{ $tag->id }}" class="mr-2">
            <span class="text-sm text-gray-800">{{ $tag->name }}</span>
        </label>
        @endforeach
    </div>
</div>