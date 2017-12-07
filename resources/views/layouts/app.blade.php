<!DOCTYPE html>
<html lang="en">

<head>

    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Freid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Add your business website description here">
    <meta name="keywords" content="Add your, business, website, keywords, here">
    <meta name="author" content="Add your business, website, author here">

    <!-- ==============================================
		Favicons
		=============================================== -->
    <link rel="shortcut icon" href="img/favicons/favicon.html">
    <link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.html">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.html">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.html">

    <!-- ==============================================
		CSS
		=============================================== -->
    <!-- Style-->
    <link type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('css/apps.css') }}" rel="stylesheet" />

    <!-- ==============================================
		Feauture Detection
		=============================================== -->
    <script src="{{ asset('js/modernizr-custom.html') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
    <body class="greybg">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
        <script src="{{ asset('bower_components/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('bower_components/tether/dist/js/tether.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/medium.js') }}"></script>
        @yield('scripts')
    </body>
</html>