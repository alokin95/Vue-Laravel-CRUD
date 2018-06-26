<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>VUE SPA</title>
                <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        
    </head>
    <body>

    <div id="app">
        @include('layouts.header')

        <div class="section">
        
            <div class="container">

                <router-view></router-view>

            </div>

        </div>

    </div>
        

        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
