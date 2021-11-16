<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Menu</span>
        <x-jet-button wire:click="openForm()">Add new menu item</x-jet-button>
    </div>
    @livewire('menus.menus-table')
    @include('livewire.menus.menus-form')
</div>
