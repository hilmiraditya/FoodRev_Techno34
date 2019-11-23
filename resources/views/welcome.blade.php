<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Food-Rev</title>

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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Admin</a>
                    @else
                        <a href="{{ route('login') }}">Admin</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div align="center">
                    <span class="title m-b-md">
                        Food-Rev
                    </span>
                    <hr>
                    <a>Restoran : <b>Ikan Bakar Keputih</b></a>
                </div>
                <br><br>
                <div class="links">
                    <a href="{{ url('/pesan') }}">Pesan</a>
                    <a href="https://laracasts.com">Contact</a>
                    <a href="https://www.google.com/maps/place/Ikan+Bakar+Keputih/@-7.2900422,112.7976441,17z/data=!3m1!4b1!4m5!3m4!1s0x2dd7fa71f2b03875:0x3d0b51a1f8c75cdf!8m2!3d-7.2900422!4d112.7998328?hl=id">Alamat</a>
                </div>
            </div>
        </div>
    </body>
</html>
