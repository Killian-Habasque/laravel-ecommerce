<div class="py-4 px-6">
    <div class="mt-4">
        <h2 class="block text-sm py-4 text-gray-800 font-bold">Tags</h2>

        @foreach($tags as $tag)
        <label class="flex items-center py-2">
            <input type="checkbox" wire:model.live="selectedTags" value="{{ $tag->id }}" class="mr-2">
            <span class="bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-800 hover:bg-gray-300 transition-all duration-200">{{ $tag->name }}</span>
        </label>
        @endforeach
    </div>
</div>