<div class="flex gap-1">
    <x-edit-button wire:click="$emit('openForm' , {{ $id }})">
        {{ __('Edit') }}
    </x-edit-button>

    <x-danger-button wire:click="$emit('confirmDelete', {{ $id }})">
        {{ __('Delete') }}
    </x-danger-button>
</div>
