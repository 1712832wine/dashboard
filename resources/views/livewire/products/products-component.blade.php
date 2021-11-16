<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Products</span>
        <x-jet-button wire:click="openForm()">Add new products</x-jet-button>
    </div>
    @livewire('products.products-table')
    @include('livewire.products.products-form')
</div>
