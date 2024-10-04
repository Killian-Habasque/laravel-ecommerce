<x-layout>
    <div class="container mx-auto">
        <a href="{{route('shop')}}" wire:navigate.hover class="flex gap-2 items-center text-gray-500 py-4 text-gray-500 hover:text-blue-600">
            <x-icons :type="'back'" />
            Retour à la boutique
        </a>

        <livewire:product-page :slug="$slug" />
    </div>
</x-layout>