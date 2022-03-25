<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Post</span>
        <x-btn.btn-primary wire:click="openForm()">Add new post</x-btn.btn-primary>
    </div>
    @livewire('posts.posts-table')
    @include('livewire.posts.posts-form')
</div>
