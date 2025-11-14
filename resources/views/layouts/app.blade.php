<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Osman VARIŞLI osmanvarisli@saglik.gov.tr">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('osman_tema/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('osman_tema/css/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('osman_tema/css/startmin.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('osman_tema/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->



    
    <link href="{{ asset('css/datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">        
    <link rel="stylesheet" href="{{ asset('css/jstable.css') }} " />

    @include('layouts.jsfiles')
</head>
<body>
   <div id="wrapper">
        @auth
            @include('layouts.navbar')
            <div id="page-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        @endauth
        @guest
            @yield('content')        
        @endguest


    </div>



</body>
</html>

