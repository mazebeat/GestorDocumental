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

	{{--{{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}--}}
	{{ HTML::style('css/style.default.css') }}
	{{ HTML::style('js/ladda/dist/ladda.min.css') }}
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css"/>
	<!--[if IE 7]>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome-ie7.min.css"/><![endif]-->

	{{ HTML::script('js/modernizr.min.js') }}

	@yield('file-style')

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --><!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script><![endif]-->

	@yield('text-style')
</head>
<body id="{{ \App\Util\SiteHelpers::bodyId() }}" ng-app="gestorDocumental">
{{--@include('layouts.preloader')--}}
<section>
	<div class="leftpanel">
		<div class="logopanel">
			{{--<h1><span>[</span> Gestor Documental <span>]</span></h1>--}}
			<h1><span><i class="fa fa-angle-double-right"></i></span> Gestor Documental</h1>
		</div>
		<!-- logopanel -->
		<div class="leftpanelinner">
			@include('layouts.dashboard-sections.left-panel')
		</div>
		<!-- leftpanelinner -->
	</div>
	<!-- leftpanel -->

	<div class="mainpanel">
		<div class="headerbar">
			@include('layouts.dashboard-sections.header')
		</div>
		<!-- headerbar -->

		<div class="pageheader">
			@include('layouts.dashboard-sections.page-header')
		</div>

		<div class="contentpanel">
			<!-- content goes here... -->
			@yield('content')
		</div>
	</div>
	<!-- mainpanel -->

	<div class="rightpanel">
		@include('layouts.dashboard-sections.right-panel')
	</div>
	<!-- rightpanel -->
</section>
{{ HTML::script('js/jquery-1.10.2.min.js') }}
{{ HTML::script('js/jquery-migrate-1.2.1.min.js') }}
{{ HTML::script('js/modernizr.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/toggles.min.js') }}
{{ HTML::script('js/retina.min.js') }}
{{ HTML::script('js/jquery.cookies.js') }}
{{ HTML::script('js/chosen.jquery.min.js') }}
{{ HTML::script('js/colorpicker.js') }}
{{ HTML::script('js/ladda/dist/spin.min.js') }}
{{ HTML::script('js/ladda/dist/ladda.min.js') }}

@yield('file-script')

@include('layouts.angularjs')

{{-- Custom javascript --}}
{{ HTML::script('js/custom.js') }}

@yield('text-script')

<script>
	jQuery('body').addClass('stickyheader');
	jQuery('.leftpanel').addClass('sticky-leftpanel');
	jQuery(".chosen-select").chosen({'width': '100%', 'white-space': 'nowrap'});
</script>
</body>
</html>
