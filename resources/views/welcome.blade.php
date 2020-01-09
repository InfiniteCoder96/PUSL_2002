
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PUSL 2002</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('dist/img/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dist/img/favicon.png')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- Styles -->
    <style>
        html, body {
            background-image: url('https://i.pinimg.com/originals/41/aa/09/41aa09f7665923b7baa82997cdb49d67.gif');
            background-size: cover;
            background-position: center;
            color: whitesmoke;
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
            color: whitesmoke;
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

        .card { background-color: rgba(245, 245, 245, 0.4); }
        .card-header, .card-footer { opacity: 1;color: whitesmoke}

    </style>
</head>
<body >
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ url('/view-accident-map') }}" class="btn btn-danger" style="padding: 5px">ACCIDENTS REPORT</a>
            @if(Auth::guard('admin')->check())
                <a href="{{ url('/home') }}" class="btn btn-social-icon btn-info"><i class="fa fa-home"></i></a>
                <div class="pull-right">
                    <a class="btn btn-warning" href="{{ route('logout') }}" style="margin-left: 5px"
                       onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        SIGN OUT
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </div>
            @else
                <a href="{{ route('login') }}">LOGIN</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md" style="background-color: rgba(0, 0, 0, 0.84);border-radius: 5px;padding: 10px">
            TRAFFIC ACCIDENTS TRACKER
        </div>
        <div class="links" style="background-color: rgba(0, 0, 0, 0.84);border-radius: 5px">
            <a>Powered by RDA, Sri Lanka</a>
        </div>

    </div>
</div>
</body>
</html>

