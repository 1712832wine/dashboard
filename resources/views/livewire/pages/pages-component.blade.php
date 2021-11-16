<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Page</span>
        <x-jet-button wire:click="openForm()">Add new page</x-jet-button>
    </div>
    @livewire('pages.pages-table')
    @include('livewire.pages.pages-form')
</div>
