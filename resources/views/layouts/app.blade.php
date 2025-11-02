<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Pizza</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- CSS & JS begin -->
        <link href="/assets/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/main.css" rel="stylesheet" type="text/css">
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
        <script src="/assets/js/script.js" type="text/javascript"></script>
        <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
        <!-- CSS & JS end -->
        <!-- Google Fonts script begins -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
        <script type="text/javascript">WebFont.load({
                google: {families:
                        [
                            "Oswald:200,300,400,500,600,700",
                            "Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic",
                            "Varela:400","Vollkorn:400,400italic,700,700italic","Bitter:400,700,400italic",
                            "PT Serif:400,400italic,700,700italic",
                            "Merriweather:300,300italic,400,400italic,700,700italic,900,900italic",
                            "Roboto:100,300,regular,500,700,900,900italic"]
                }
            });</script>
        <!-- Google Fonts script ends -->
        <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
        <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);
        </script>
        <link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
        <link href="/assets/images/ph-icon.png" rel="apple-touch-icon">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

    @include("header")
        <div class="min-h-screen bg-gray-100">


            <!-- Page Heading -->
            @isset($header)
                <!-- Page title section begins -->
                <div class="section-hero title">
                    <div class="container w-container">
                        <h1 class="bottom-margin-extra-small"> {{ $header }}</h1>
                        <h3 class="hero-sub-title"></h3>
                    </div>
                </div>
                <!-- Page title section ends -->

            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
