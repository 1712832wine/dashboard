<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Menu</span>
        <x-btn.btn-primary wire:click="openForm()">Add new menu item</x-btn.btn-primary>
    </div>
    @livewire('menus.menus-table')
    @include('livewire.menus.menus-form')
</div>
