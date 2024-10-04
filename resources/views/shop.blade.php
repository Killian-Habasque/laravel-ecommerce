<x-layout>
    <div class="flex grow">
        <nav class="w-64 bg-white border-r border-slate-200">
            <livewire:products-categories />
            <livewire:products-tags />
        </nav>
        <div class="flex-grow p-4 overflow-y-scroll bg-slate-100">
            <div class="container mx-auto">
                <livewire:products-list />
            </div>
        </div>
    </div>
</x-layout>