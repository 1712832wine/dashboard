<x-jet-dialog-modal wire:model="isOpen">
    <x-slot name="title">
        {{ __('API Token') }}
    </x-slot>

    <x-slot name="content">
        <div>
            {{ __('Please copy your new API token. For your security, it won\'t be shown again.') }}
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen', false)" wire:loading.attr="disabled">
            {{ __('Close') }}
        </x-jet-secondary-button>
    </x-slot>

</x-jet-dialog-modal>
