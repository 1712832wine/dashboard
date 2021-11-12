<div class="px-3 pb-3">
    <div class="d-flex justify-content-between mb-2">
        <h2>User</h2>
        <x-jet-button wire:click="openForm()">Add new user</x-jet-button>
    </div>
    @livewire('users.users-table')
    @include('livewire.users.users-form')
    @livewire('confirm-alert')
</div>
