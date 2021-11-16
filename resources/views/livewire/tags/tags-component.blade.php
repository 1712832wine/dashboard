<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Tag</span>
        <x-jet-button wire:click="openForm()">Add new tag</x-jet-button>
    </div>
    @livewire('tags.tags-table')
    @include('livewire.tags.tags-form')
</div>
