<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url("https://wallpaper.wiki/wp-content/uploads/2017/04/wallpaper.wiki-Green-Best-Nature-HD-Wallpapers-PIC-WPD003784-1.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-weight: bold;
                color:  #d6e25e;
                text-shadow: black 2px 2px 7px;
                transition: all 0.1s;
            }
            .cover{
                background-color: #00000033;
                box-shadow: black 0 0 7px;
                border-radius: 20px;
                padding: 100px;
                width: 700px;
                /*border: .7px solid wheat;*/
            }
            .cover:hover .content{
                text-shadow: black 2px 12px 7px;
                transform: scale(1.2);
                cursor: hand;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
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
                    @if (Auth::check())
                        {{--<a href="{{ url('/home') }}">Home</a>--}}
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

           <div class="cover">
               <div class="content">
                   <div class="title m-b-md">
                       FOOD
                   </div>
           </div>
            </div>
        </div>
        <script>
            var content = document.getElementsByClassName('cover')[0];
            content.onclick = function () {
                location.href = '/food';
            }
        </script>
    </body>
</html>
