<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Categories</span>
        <x-btn.btn-primary wire:click="openForm()">Add new category</x-btn.btn-primary>
    </div>
    @livewire('categories.categories-table')
    @include('livewire.categories.categories-form')
</div>
