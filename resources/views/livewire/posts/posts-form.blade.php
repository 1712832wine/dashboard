<form wire:submit.prevent="submit">
    @csrf
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ __('Post form') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <div class="required">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" wire:model.defer="post.title" class="block mt-1 w-full" type="text"
                        name="title" :value="old('title')" autocomplete />
                    <x-jet-input-error for="post.title" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <x-jet-input id="slug" wire:model.defer="post.slug" class="block mt-1 w-full" type="text" name="slug"
                        autocomplete />
                    <div class="text-gray-400 mt-1">Will be automatically generated from your name, if left empty.</div>
                    <x-jet-input-error for="post.slug" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="date" value="{{ __('Date') }}" />
                    <x-jet-input id="date" wire:model.defer="post.date" class="block mt-1 w-full" type="date" name="date"
                        autocomplete />
                    <x-jet-input-error for="post.date" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="content" value="{{ __('Content') }}" />
                    <div wire:ignore class="block mt-1 w-full">
                        <div id="toolbar-container">
                        </div>
                        <div id="editor">
                        </div>
                    </div>
                    <x-jet-input-error for="post.content" class="mt-2" />
                </div>


                <div class="mt-4">
                    <x-jet-validation-errors />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
            <x-btn.btn-success type="submit" wire:loading.attr="disabled">
                {{ __('Submit') }}
            </x-btn.btn-success>
        </x-slot>
    </x-jet-dialog-modal>
    @push('modals')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                DecoupledEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        // The toolbar needs to be explicitly appended.
                        document.querySelector('#toolbar-container').appendChild(editor.ui.view.toolbar.element);
                        window.editor = editor;
                    })
                    .catch(error => {
                        console.error('There was a problem initializing the editor.', error);
                    });
            })
        </script>
    @endpush

    
</form>
