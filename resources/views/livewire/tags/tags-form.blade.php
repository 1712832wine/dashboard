<form wire:submit.prevent="submit">
    @csrf
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ __('Tags form') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <div class="required">
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" wire:model.defer="tag.name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autocomplete />
                    <x-jet-input-error for="tag.name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <x-jet-input id="slug" wire:model.defer="tag.slug" class="block mt-1 w-full" type="text" name="slug"
                        autocomplete />
                    <div class="text-gray-400 mt-1">Will be automatically generated from your name, if left empty.</div>
                    <x-jet-input-error for="tag.slug" class="mt-2" />
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
</form>
