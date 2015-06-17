<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="shortcut icon" href="images/favicon.png" type="image/png">--}}
    <title>@yield('title')</title>

    {{ HTML::style('css/style.default.css') }}
    {{ HTML::script('js/modernizr.min.js') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
<body id="{{ \App\Util\SiteHelpers::bodyId() }}" class="signin">
@include('layouts.preloader')

{{ HTML::script('js/jquery-1.10.2.min.js') }}
{{ HTML::script('js/jquery-migrate-1.2.1.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/retina.min.js') }}
{{ HTML::script('js/custom.js') }}
</body>
</html>
