@extends('layouts.dashboard')

@section('title')
@endsection

@section('page-title')
<i class="fa fa-lock fa-fw"></i> Perfiles<span>Gestor Documental...</span>
@endsection

@section('breakcrumb')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		{{--{{ Form::open() }}--}}
		<div class="panel panel-dark">
			<div class="panel-heading">
				<div class="panel-btns">
					<a href="{{ URL::to('#') }}" class="panel-close">&times;</a>
					<a href="{{ URL::to('#') }}" class="minimize">&minus;</a>
				</div>
				<h4 class="panel-title">Permisos</h4>
			</div>
			<div class="panel-body">
				{{ Form::checkbox2('p_mantenedor', 'Mantenedor Usuarios', 'primary', false, array('')) }}
				{{ Form::checkbox2('p_estructura', 'Estructura Ambiente', 'primary', false, array('')) }}
				{{ Form::checkbox2('p_eliminar', 'Eliminar Cliente', 'primary', false, array('')) }}
				{{ Form::checkbox2('p_almacenar', 'Almacenar Información', 'primary', true, array('')) }}
				{{ Form::checkbox2('p_consultar', 'Consultar Información', 'primary', false, array('')) }}
				{{ Form::checkbox2('p_visualizar', 'Visualizar Documentos', 'primary', false, array('')) }}
				{{ Form::checkbox2('p_descargar', 'Descargar Documentos', 'primary', false, array('')) }}
				{{ Form::checkbox2('p_imprimir', 'Imprimir Documentos', 'primary', false, array('')) }}
				{{ Form::checkbox2('p_versionar', 'Versionar Documentos', 'primary', false, array('')) }}
				<div class="form-group">
					{{ Form::submit('Asociar Perfiles', array('class' => 'btn btn-primary btn-block')) }}
				</div>
			</div>
		</div>
		{{--{{ Form::close() }}--}}
	</div>
</div>
@endsection

@section('file-style')
@endsection

@section('text-style')
<style>
</style>
@endsection

@section('file-script')
@endsection

@section('text-script')
<script>
</script>
@endsection
