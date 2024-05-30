<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />

    {{-- Datatable CDNs --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <!-- Sidebar -->

    @include('layouts.admin.navigation')

    <!-- Rest of board -->

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex-1 flex flex-col">

        <!-- Header -->

        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>

        <!-- Main Content -->

        <main class="overflow-auto flex-1 flex flex-col p-5">

            <!-- Alerts -->

            <div class="max-w-75 mx-auto">
                <x-blocks.error>
                </x-blocks.error>

                <x-blocks.success>
                </x-blocks.success>
            </div>

            <!-- Dynamic content -->
            
            <div class="flex-1">
                @yield('content')
            </div>

        </main>
    </div>

    <!-- Scripts -->
    @yield('scripts')

</body>

</html>
