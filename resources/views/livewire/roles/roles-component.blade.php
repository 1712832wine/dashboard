<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Role</span>
        <x-btn.btn-primary wire:click="openForm()">Add new role</x-btn.btn-primary>
    </div>
    @livewire('roles.roles-table')
    @include('livewire.roles.roles-form')
</div>
