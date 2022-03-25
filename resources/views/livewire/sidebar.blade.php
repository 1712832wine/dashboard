<div class="flex flex-col w-full md:w-64 text-gray-700 bg-blue-300 shadow-md z-20 dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0 transition duration-200"
    x-show="open">
    <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
        <a href="#"
            class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Flowtrail
            UI</a>
    </div>
    <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto hidden">
        <x-sidebar.dropdown route="authentication">
            <x-sidebar.item route='users'>{{ __('User') }}</x-sidebar.item>
            <x-sidebar.item route='roles'>{{ __('Role') }}</x-sidebar.item>
            <x-sidebar.item route='permissions'>{{ __('Permission') }}</x-sidebar.item>
        </x-sidebar.dropdown>
        <x-sidebar.dropdown route="news">
            <x-sidebar.item route='categories'>{{ __('Categories') }}</x-sidebar.item>
            <x-sidebar.item route='tags'>{{ __('Tags') }}</x-sidebar.item>
            <x-sidebar.item route='posts'>{{ __('Posts') }}</x-sidebar.item>
        </x-sidebar.dropdown>

        <x-sidebar.item route='pages'>{{ __('Pages') }}</x-sidebar.item>
        <x-sidebar.item route='menus'>{{ __('Menus') }}</x-sidebar.item>
        <x-sidebar.item route='products'>{{ __('Products') }}</x-sidebar.item>
        <x-sidebar.item route='albums'>{{ __('Albums') }}</x-sidebar.item>
    </nav>
</div>

