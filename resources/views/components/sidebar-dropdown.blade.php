<x-dropdown align="right" width="60" dropdownClasses="left-0">
    <x-slot name="trigger">
        <span class="block">
            <div class="d-block w-100 items-center px-3 py-2 transition">
                Authentication
            </div>
        </span>
    </x-slot>

    <x-slot name="content">
        <div class="w-60">
            <!-- Team Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                <ul>
                    <x-sidebar-item route="users">{{ __('Users') }}</x-sidebar-item>
                    <x-sidebar-item route="roles">{{ __('Roles') }}</x-sidebar-item>
                    <x-sidebar-item route="permissions">{{ __('Permissions') }}</x-sidebar-item>
                </ul>
            </div>

        </div>
    </x-slot>
</x-dropdown>
