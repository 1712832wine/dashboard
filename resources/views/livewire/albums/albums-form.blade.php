<form wire:submit.prevent="submit">
    @csrf
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ __('Album form') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" wire:model.defer="permission.name" class="block mt-1 w-full" type="text"
                        name="name" :value="old('name')" autocomplete />
                    <x-jet-input-error for="permission.name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="permission.guard_name" class="block mt-1 w-full"
                        type="text" name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="permission.guard_name" class="mt-2" />
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
