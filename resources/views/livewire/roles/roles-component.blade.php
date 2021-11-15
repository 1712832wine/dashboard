<div class="px-3 pb-3">
    <div class="d-flex justify-content-between mb-2">
        <h2>Role</h2>
        <x-jet-button wire:click="openForm()">Add new role</x-jet-button>
    </div>
    @livewire('roles.roles-table')
    @include('livewire.roles.roles-form')
</div>
