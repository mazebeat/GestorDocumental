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

	<h2>Bienvenido al Gestor Documental de {{ Config::get('api.company') }}</h2>
	<div ng-controller="treeViewController2">
		{{--<div ng-show="objeto.listFolder && objeto.year && !objeto.messageError">--}}
		<div ng-show="objeto.year">
			<ul class="breadcrumb">
				<li>@{{ objeto.year }}</li>
				<li ng-repeat="b in objeto.breadcrums" ng-class="{ active: $last }">@{{ b }}<span class="divider" ng-show="!$last">/</span></li>
			</ul>
		</div>

		<div class="panel panel-dark panel-alt widget-messaging">
			<div class="panel-heading">
				<div class="panel-btns">
					{{--<a title="" data-toggle="tooltip" class="tooltips" href="" data-original-title="Settings"><i class="glyphicon glyphicon-cog"></i></a>--}}
					{{--<a title="" data-toggle="tooltip" class="tooltips" id="addnewtodo" href="" data-original-title="Add New"><i class="glyphicon glyphicon-plus"></i></a>--}}
				</div>
				<!-- panel-btns -->
				<h3 class="panel-title">Listado de carpetas</h3>

				<p ng-show="objeto.year != '' || objeto.year">Año @{{ objeto.year }}</p>
			</div>

			<div class="panel-body nopadding">
				<ul class="todo-list">
					<li show-folders ng-repeat="list in objeto.listFolder" ng-model='list'>
						@{{ list.name }}
					</li>
				</ul>
			</div>
			<!-- panel-body -->
		</div>
		{{--</div>--}}
		<div ng-show="objeto.messageError">
			<div class="alert alert-warning">
				@{{ objeto.messageError }}
			</div>
		</div>
	</div>


@endsection

@section('text-script')
	<script type="text/javascript"></script>
@endsection
