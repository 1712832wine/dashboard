<div class="p-3 w-50">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">User</span>
        <x-jet-button wire:click="openForm()">Add new user</x-jet-button>
    </div>
    @livewire('users.users-table')
    @include('livewire.users.users-form')
</div>
