<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Post</span>
        <x-jet-button wire:click="openForm()">Add new post</x-jet-button>
    </div>
    @livewire('posts.posts-table')
    @include('livewire.posts.posts-form')
</div>
