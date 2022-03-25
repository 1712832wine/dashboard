<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Products</span>
        <x-btn.btn-primary wire:click="openForm()">Add new products</x-btn.btn-primary>
    </div>
    @livewire('products.products-table')
    @include('livewire.products.products-form')
</div>
