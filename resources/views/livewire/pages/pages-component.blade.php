<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Page</span>
        <x-btn.btn-primary wire:click="openForm()">Add new page</x-btn.btn-primary>
    </div>
    @livewire('pages.pages-table')
    @include('livewire.pages.pages-form')
</div>
