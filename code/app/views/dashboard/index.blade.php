@extends('layouts.dashboard')

@section('title')
Inicio
@endsection

@section('page-title')
<i class="fa fa-home"></i> Inicio<span>Gestor Documental...</span>
@endsection

@section('breakcrumb')
@endsection

@section('content')
<h2>Bienvenido al Gestor Documental de Movistar</h2>
<div ng-controller="treeViewController2">
	<div ng-show="objeto.year">
		<ul class="breadcrumb">
			<li>Año @{{ objeto.year }}</li>
			<li ng-repeat="b in objeto.breadcrums" ng-class="{ active: $last }">@{{ b }} <span class="divider" ng-show="!$last">/</span></li>
		</ul>
		<h3>Año @{{ objeto.year }}</h3>
	</div>
	<ul ng-show="objeto.listFolder">
		<li show-folders ng-repeat="list in objeto.listFolder" ng-model='list'></li>
	</ul>
	<div ng-show="objeto.messageError">
		<div class="alert alert-warning">
			@{{ objeto.messageError }}
		</div>
	</div>
</div>
@endsection

@section('text-script')
<script type="text/javascript">
</script>
@endsection
