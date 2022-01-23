<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- custom style START -->
    <style>
        *{
            padding:0;
            margin:0;
            font-family:sans-serif;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/custom_x.css')}}">
    <!-- custom style END -->

    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    </head>
    <body>

            <div id="app">

            </div>
        @yield('content')
        <footer class="footer">
            <div class="container">
                <div class="has-text-centered">
                    <p>
                      core v{{ Illuminate\Foundation\Application::VERSION }} 
                        (PHP v{{ PHP_VERSION }})
                    </p>
                </div>

            </div>
        </footer>
        <script src="{{mix('js/app.js')}}"></script>
    </body>
</html>
