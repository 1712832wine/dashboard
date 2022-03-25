<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Album</span>
        <x-btn.btn-primary wire:click="openForm()">Add new album</x-btn.btn-primary>
    </div>
    @livewire('albums.albums-table')
    @include('livewire.albums.albums-form')
</div>
