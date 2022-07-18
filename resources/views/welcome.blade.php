<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="px-4 py-5 my-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('images/hasnur.png') }}" alt="">
        <h1 class="display-5 fw-bold">WebDevPOLHAS</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Aplikasi Penilaian Mahasiswa oleh <a href="https://github.com/muzakirnur"
                    style="color: red;text-decoration:none" target="_tblank"><b>Muzakir
                        Nur</b></a> </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                @auth
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg px-4 gap-3">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 gap-3">Login Now</a>
                @endauth
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
