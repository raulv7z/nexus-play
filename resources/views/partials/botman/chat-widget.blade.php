<!DOCTYPE html>
<html lang="en">

<head>
    <title>BotMan Widget</title>
    <meta charset="UTF-8">

    {{-- Default Styles --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">

    {{-- Custom Styles --}}
    @vite('resources/css/modules/chat-widget.css')

    {{-- Custom Interactiviy JS --}}
    @vite('resources/js/modules/services/botman/chat-widget.js')

</head>

<body>

    {{-- Chat Script --}}
    <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script>

</body>

</html>