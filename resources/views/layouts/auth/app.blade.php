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

    {{-- BotMan CDNs --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

    {{-- BotMan Widget Config --}}
    <script>
        const botIntroMessage =
            "👋🏼 ¡Hola! Me llamo Nexbot. <br><br> Soy el asistente virtual de Nexus Play y estoy aquí para ayudarte.";
        const placeholderMessage = 'Escribe tu mensaje...';

        var botmanWidget = {
            frameEndpoint: '/botman/chat-widget',
            chatServer: '/botman',
            introMessage: botIntroMessage,
            placeholderText: placeholderMessage,
            title: '🤖 • Nexbot está en línea',
            mainColor: '#c9f0da',
            bubbleBackground: '#4949de',
            bubbleAvatarUrl: 'storage/images/interface/nexbot.gif',
            aboutText: 'Nexus Play',
            aboutLink: "http://localhost:8000",
        };
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col bg-gray-100 dark:bg-gray-900">

        @include('layouts.auth.navigation')

        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('header')
            </div>
        </header>

        <!-- Page Content -->

        <main class="flex-1 flex flex-col p-5">

            <!-- Dynamic content -->

            <div class="flex-1">
                @yield('content')
            </div>

            <!-- Alerts -->

            <div>
                <x-blocks.error>
                </x-blocks.error>

                <x-blocks.success>
                </x-blocks.success>
            </div>

        </main>

        <!-- footer -->
        @include('layouts.auth.footer')
    </div>

    <!-- specific scripts -->
    @yield('scripts')

</body>

</html>
