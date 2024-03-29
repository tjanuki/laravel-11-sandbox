<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.Echo) {
            console.log('window.Echo', window.Echo);
            console.log('App.Models.User.', 'App.Models.User.' + {{ auth()->id() }});

            window.Echo.private('App.Models.User.' + {{ auth()->id() }})
                .notification((notification) => {
                    console.log(notification);
                    alert(notification.title)
                });

            window.Echo.private('App.Models.User.' + {{ auth()->id() }})
                .listen('OrderShipmentStatusUpdated', (event) => {
                    console.log(event);
                    alert('Order shipment status updated');
                });

        } else {
            console.error("Echo is not initialized");
        }
    });
</script>
</html>
