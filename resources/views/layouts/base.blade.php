<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    @include('inc.navbar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mb-3 col-md-3">
                @include('inc.navlateral')
            </div>
            <div class="col-sm-12 col-md-7">
                @yield('content')
            </div>

        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>