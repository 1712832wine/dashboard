<form wire:submit.prevent="submit">
    @csrf
    <x-jet-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            {{ __('User form') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" wire:model.defer="user.name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autocomplete />
                    <x-jet-input-error for="user.name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" wire:model.defer="user.email" class="block mt-1 w-full" type="email"
                        name="email" :value="old('email')" autocomplete />
                    <x-jet-input-error for="user.email" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" wire:model.defer="password" class="block mt-1 w-full" type="text"
                        name="password" autocomplete />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" wire:model.defer="password_confirmation"
                        class="block mt-1 w-full" type="password" name="password_confirmation" />
                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                </div>

                <div class="mt-4">
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
                </div>

                <div class="mt-4">
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
            <x-success-button type="submit" wire:loading.attr="disabled">
                {{ __('Submit') }}
            </x-success-button>
        </x-slot>
    </x-jet-dialog-modal>
</form>
