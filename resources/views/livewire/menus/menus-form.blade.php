<form wire:submit.prevent="submit">
    @csrf
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ __('Menu form') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" wire:model.defer="role.name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autocomplete />
                    <x-jet-input-error for="role.name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="role.guard_name" class="block mt-1 w-full" type="text"
                        name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="role.guard_name" class="block mt-1 w-full" type="text"
                        name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="role.guard_name" class="block mt-1 w-full" type="text"
                        name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="role.guard_name" class="block mt-1 w-full"
                        type="text" name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="role.guard_name" class="block mt-1 w-full"
                        type="text" name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="role.guard_name" class="block mt-1 w-full"
                        type="text" name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="guard_name" value="{{ __('Guard name') }}" />
                    <x-jet-input id="guard_name" wire:model.defer="role.guard_name" class="block mt-1 w-full"
                        type="text" name="guard_name" autocomplete disabled />
                    <x-jet-input-error for="role.guard_name" class="mt-2" />
                </div>

                {{-- <div class="mt-4">
                    <x-jet-label value="{{ __('Permission') }}" />
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ($list_permissions as $permission)
                            <div class="">
                                <x-jet-checkbox :id="$permission" wire:model.defer="permissions" :value="$permission" />
                                <label class="text-sm text-gray-600"
                                    for="{{ $permission }}">{{ $permission }}</label>
                            </div>
                        @endforeach
                    </div>
                    <x-jet-input-error for="permissions" class="mt-2" />
                </div> --}}

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
