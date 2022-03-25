<div class="p-3">
    <div class="flex justify-between mb-2">
        <span class="text-3xl">Post</span>
        <x-btn.btn-primary wire:click="openForm()">Add new post</x-btn.btn-primary>
    </div>
    @livewire('posts.posts-table')
    @include('livewire.posts.posts-form')
    <script>
        
        document.addEventListener('livewire:load', function() {
            window.addEventListener('getData', () => {
                console.log(window.editor.getData())
                @this.content = window.editor.getData();
            })
            window.addEventListener('setData', event => {
                window.editor.setData(event.detail.content);
            })
        })
    </script>`
</div>
