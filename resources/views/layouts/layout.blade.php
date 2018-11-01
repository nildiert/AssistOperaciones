
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--SCRIPTS -->
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/sweetalert2.css')!!}
    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/popper.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/sweetalert.min.js')!!}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->



    <title>Admin Assist</title>

    <!-- Bootstrap CSS CDN -->

    <!-- Our Custom CSS -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Scrollbar Custom CSS -->

    <!-- Font Awesome JS -->

</head>

<body>

@include('layouts.app')
            @yield('content')


