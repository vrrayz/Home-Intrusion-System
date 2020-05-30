<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home Intrusion System') }}</title>

    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    
        .main {
            display: block;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('/img/house.jpg') no-repeat fixed center center;
            background-size: cover;
        }
    
        .padlock {
            position: absolute;
            top: -4em;
            left: 41%;
            width: 60px;
    
                {
                    {
                    -- animation-name: big;
                    animation-duration: 0.1s;
                    --
                }
            }
        }
    
        @keyframes big {
            from {
                width: 60px;
            }
    
            to {
                width: 70px;
            }
        }
    
        .mid-section {
            position: relative;
            top: 40%;
        }
    
        .mid-section .title-text {
            font-family: 'Rajdhani', sans-serif;
            font-size: 2.5em;
        }
    
        .btn-dark {
            background-color: #111;
            border-color: #111;
        }
    </style>
</head>
<body>
    <div class="main">
        @yield('main')
    </div>
</body>
</html>
