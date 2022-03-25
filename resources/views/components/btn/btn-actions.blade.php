<div class="flex gap-1">
    <x-btn.btn-warning wire:click="$emit('openForm' , {{ $id }})">
        {{ __('Edit') }}
    </x-btn.btn-warning>

    <x-btn.btn-danger wire:click="$emit('confirmDelete', {{ $id }})">
        {{ __('Delete') }}
    </x-btn.btn-danger>
</div>
