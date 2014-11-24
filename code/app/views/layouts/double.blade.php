<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Gestor documental">
	<meta name="author" content="Intelidata">
	{{--<link rel="shortcut icon" href="images/favicon.png" type="image/png">--}}
	<title>@yield('title')</title>

	{{ HTML::style('css/style.default.css') }}
	{{ HTML::style('js/ladda/dist/ladda.min.css') }}

	@yield('file-style')

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    @yield('text-style')
</head>
<body id="{{ \App\Util\SiteHelpers::bodyId() }}" class="signin" ng-app="gestorDocumental">
	@include('layouts.preloader')
	<section>
		<div class="signinpanel">
			<div class="row">
				<div class="col-md-5">
					@yield('left-side')
					{{--@include('layouts.double-sections.left-side')--}}
				</div><!-- col-sm-7 -->

				<div class="col-md-7">
					@yield('right-side')
					{{--@include('layouts.double-sections.right-side')--}}
				</div><!-- col-sm-5 -->

			</div><!-- row -->

			<div class="signup-footer">
				@include('layouts.double-sections.footer')
			</div>

		</div><!-- signin -->
	</section>
	{{ HTML::script('js/jquery-1.10.2.min.js') }}
	{{ HTML::script('js/jquery-migrate-1.2.1.min.js') }}
	{{ HTML::script('js/bootstrap.min.js') }}
	{{ HTML::script('js/retina.min.js') }}
	{{ HTML::script('js/chosen.jquery.min.js') }}

	{{ HTML::script('js/ladda/dist/spin.min.js') }}
	{{ HTML::script('js/ladda/dist/ladda.min.js') }}

    @yield('file-script')
	@yield('text-script')

    @include('layouts.angularjs')

    {{ HTML::script('js/custom.js') }}

    <script>
        jQuery(".chosen-select").chosen({'width': '100%', 'white-space': 'nowrap'});
    </script>
</body>
</html>
