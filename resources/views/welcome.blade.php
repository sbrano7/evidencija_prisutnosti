<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Evidencija prisutnosti</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                color: black;
                font-family: bold;
                text-shadow: 3px 3px 5px white;

            }

            .title {
                font-size: 100px;
            }

            .links > a {
                color: black;
                font-family: bold;
                padding: 20px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                box-sizing: border-box;
                background-color: lightblue;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="view" style="background-image: url('../../evidencija_prisutnosti/slikapozadine.jpg'); ">
            <div class="flex-center position-ref full-height">
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/kolegiji/pogled') }}">Početna</a>
                    @else
                        <a href="{{ route('login') }}">Prijava</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registracija</a>
                        @endif
                    @endauth
                </div>
                @endif

            <div class="content">
                <div class="title m-b-md ">
                    Evidencija prisutnosti</br> na predavanju
                </div>

            </div>
        </div>
        
    </body>
</html>
