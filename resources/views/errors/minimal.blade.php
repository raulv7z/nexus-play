<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

    @vite('resources/css/modules/errors-minimal.css')

</head>

<body>

    <div id="errors-container">
        <div class="errors-container-bg"></div>
        <div class="errors-container-info">
        
            <div class="errors-container-code">
                <h1>@yield('code')</h1>
            </div>

            <h2>
                @yield('message')
            </h2>
            
            <a href="/" class="home-btn">
                {{ __('Go Home') }}
            </a>
            <a href="/home/company/contact-us" class="contact-btn">
                {{ __('Contact Us') }}
            </a>
        
        </div>
    </div>

</body>

</html>
