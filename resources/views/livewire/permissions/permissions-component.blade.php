<div class="px-3 pb-3">
    <div class="d-flex justify-content-between mb-2">
        <h2>Permissions</h2>
        <x-jet-button wire:click="openForm()">Add new permissions</x-jet-button>
    </div>
    @livewire('permissions.permissions-table')
    @include('livewire.permissions.permissions-form')
</div>
