{{-- <nav id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}">
            <span class="title font-sans"><b>NH</b> Dashboard</span>
        </a>
    </div>
    <ul class="list-unstyled components">
        <li class=" active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle">Authentication</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <x-sidebar-item route="users">{{ __('Users') }}</x-sidebar-item>
                <x-sidebar-item route="roles">{{ __('Roles') }}</x-sidebar-item>
                <x-sidebar-item route="permissions">{{ __('Permissions') }}</x-sidebar-item>
            </ul>
        </li>
        <x-sidebar-dropdown />
    </ul>
</nav> --}}
<div @click.away="open = false"
    class="flex flex-col w-full md:w-64 text-gray-700 bg-white shadow-md z-20 dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
    x-data="{ open: false }">
    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
        <a href="#"
            class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Flowtrail
            UI</a>
        <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" style="display: none;"></path>
            </svg>
        </button>
    </div>
    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto hidden">
        <x-sidebar-dropdown route="authentication">
            <x-sidebar-item route='users'>{{ __('User') }}</x-sidebar-item>
            <x-sidebar-item route='roles'>{{ __('Role') }}</x-sidebar-item>
            <x-sidebar-item route='permissions'>{{ __('Permission') }}</x-sidebar-item>
        </x-sidebar-dropdown>
        <x-sidebar-dropdown route="Authen2">
            <x-sidebar-item route='users'>{{ __('User') }}</x-sidebar-item>
            <x-sidebar-item route='roles'>{{ __('Role') }}</x-sidebar-item>
            <x-sidebar-item route='permissions'>{{ __('Permission') }}</x-sidebar-item>
        </x-sidebar-dropdown>
    </nav>
</div>
