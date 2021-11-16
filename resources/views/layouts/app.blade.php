<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- CORE --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/dashboard.css">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased" x-data="{ open: true }">
    <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
        @livewire('sidebar')
        <!-- Page Content -->
        <div class="flex-grow overflow-hidden">
            @livewire('navigation-menu')
            {{ $slot }}
        </div>
        @include('sweetalert::alert')
    </div>
    {{-- Script --}}
    <script>
        const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
            Swal.fire({
                icon,
                title,
                html,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText,
                reverseButtons: true,
            }).then(result => {
                if (result.value) {
                    return livewire.emit(method, params)
                }

                if (callback) {
                    return livewire.emit(callback)
                }
            })
        }

        // Confirm alert
        document.addEventListener('DOMContentLoaded', () => {

            this.livewire.on('swal:confirm', data => {
                SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params,
                    data.callback)
            })

        })
    </script>

    @stack('modals')

    @livewireScripts
</body>

</html>
