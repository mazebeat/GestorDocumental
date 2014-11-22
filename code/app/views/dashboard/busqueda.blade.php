@extends('layouts.dashboard')

@section('title')
Filtros de busqueda
@endsection

@section('page-title')
<i class="fa fa-search"></i> Busqueda<span>Gestor Documental...</span>
@endsection

@section('breakcrumb')
@endsection

@section('content')
<div class="panel panel-dark">
	<div class="panel-heading">
		<div class="panel-btns">
			<a href="{{ URL::to('#') }}" class="panel-close">&times;</a>
			<a href="{{ URL::to('#') }}" class="minimize">&minus;</a>
			{{--<a href="{{ URL::to('#') }}" class="minimize maximize">&plus;</a>--}}
		</div>
		<h4 class="panel-title">Filtros a buscar</h4>
	</div>
	<div class="panel-body">
		{{ Form::open(array('url' => 'dashboard/search', 'method' => 'POST')) }}
		<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					@if(Form::hasMacro('filter_radios'))
					{{ Form::filter_radios() }}
					@endif
				</div>
				<ul class="list-inline flex-container space-between">
					<li class="rdio rdio-primary">
						{{ Form::radio('filter', 1, false, array('id' => 'rut')) }}
						<label for="rut">Rut Cliente</label>
					</li>
					<li class="rdio rdio-primary">
						{{ Form::radio('filter', 2, false, array('id' => 'cc')) }}
						<label for="cc">Cuenta Cliente</label>
					</li>
					<li class="rdio rdio-primary">
						{{ Form::radio('filter', 3, false, array('id' => 'nc')) }}
						<label for="nc">Numero Cliente</label>
					</li>
					<li class="rdio rdio-primary">
						{{ Form::radio('filter', 4, true, array('id' => 'all')) }}
						<label for="all">Todos</label>
					</li>
				</ul>
			</div>
			<div class="col-md-2 pull-right">
				{{ Form::button('Otros filtros', array('class' => 'btn btn-white pull-right'), false) }}
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-10" ng-controller="searchController">
					{{ Form::text('keyword', isset($word) ? $word : null, array('class' => 'form-control mb15', 'placeholder' => 'Busca aquí...', 'ng-change' => 'change(keyword)'))  }}
				</div>
				<div class="col-md-2">
					{{ Form::button('<i class="fa fa-ellipsis-h"></i>', array('class' => 'btn btn-white col-md-4')) }}
					{{ Form::submit('Buscar', array('class' => 'btn btn-primary col-md-7 pull-right')) }}
				</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
<h4>Informe Resultados</h4>
{{ Form::open(array('url' => 'dashboard/export')) }}
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-responsive table-hover">
					<thead>
						<tr>
							<th></th>
							<th>ID</th>
							<th>FECHA</th>
							<th>RUT</th>
							<th>CUENTA N°</th>
							<th>CLIENTE</th>
							<th>ESTADO</th>
							<th>TOTAL DOCUMENTOS</th>
						</tr>
					</thead>
					<tbody>
						@if(HTML::hasMacro('search_result') AND isset($keyword) AND  $keyword != '')
						{{ HTML::search_result($keyword) }}
						@endif
						<tr>
							<td>
								<div class="rdio rdio-primary">{{ Form::radio('user', 1, false, array('id' => '1')) }}<label for="1"></label>
								</div>
							</td>
							<td>1</td>
							<td>2004/01/23</td>
							<td>16.517.430-6</td>
							<td>888888888888888</td>
							<td>Alexis San Martin</td>
							<td><span class="label label-success">Activo</span></td>
							<td>10</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			<div class="col-md-7">
				@if(Form::hasMacro('progressbar'))
				{{ Form::progressbar() }}
				@endif
				<div class="progress">
					<div class="progress-bar progress-bar-success" style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar">
						<span class="sr-only">40% Complete (success)</span>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
					<ul class="list-inline">
						<li class="rdio rdio-primary">
							{{ Form::radio('format', 'pdf', false, array('id' => 'pdf')) }}
							<label for="pdf">PDF</label>
						</li>
						<li class="rdio rdio-primary">
							{{ Form::radio('format', 'xls', false, array('id' => 'xls')) }}
							<label for="xls">XLS</label>
						</li>
						<li>{{ Form::submit('Exportar', array('class' => 'btn btn-default')) }}</li>
						<li class="pull-right">{{ Form::button('Ver Detalle', array('class' => 'btn btn-white'), false) }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
{{ Form::close() }}
@endsection

@section('file-style')
@endsection

@section('text-style')
@endsection

@section('file-script')
@endsection

@section('text-script')
<script>
	$( '#form-add-setting' ).on( 'submit', function() {
		
        //.....
        //show some spinner etc to indicate operation in progress
        //.....
        
        $.post(
        	$( this ).prop( 'action' ),
        	{
        		"_token": $( this ).find( 'input[name=_token]' ).val(),
        		"setting_name": $( '#setting_name' ).val(),
        		"setting_value": $( '#setting_value' ).val()
        	},
        	function( data ) {
                //do something with data/response returned by server
            },
            'json'
            );
        
        //.....
        //do anything else you might want to do
        //.....
        
        //prevent the form from actually submitting in browser
        return false;
    } );
</script>
@endsection
