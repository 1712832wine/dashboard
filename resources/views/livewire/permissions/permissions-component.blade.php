<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Permission</span>
        <x-btn.btn-primary wire:click="openForm()">Add new permissions</x-btn.btn-primary>
    </div>
    @livewire('permissions.permissions-table')
    @include('livewire.permissions.permissions-form')
</div>
