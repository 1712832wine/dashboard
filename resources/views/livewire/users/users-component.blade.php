<div class="p-3 w-50">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">User</span>
        <x-btn.btn-primary wire:click="openForm()">Add new user</x-btn.btn-primary>
    </div>
    @livewire('users.users-table')
    @include('livewire.users.users-form')
</div>
