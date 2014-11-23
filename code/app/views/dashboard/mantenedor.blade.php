@extends('layouts.dashboard')

@section('title')
Mantenedor
@endsection

@section('page-title')
<i class="fa fa-pencil-square-o"></i> Mantenedor<span>Gestor Documental...</span>
@endsection

@section('breakcrumb')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-dark">
			<div class="panel-heading">
				<div class="panel-btns">
					<a href="{{ URL::to('#') }}" class="panel-close">&times;</a>
					<a href="{{ URL::to('#') }}" class="minimize">&minus;</a>
				</div>
				<h4 class="panel-title">Usuarios</h4>
			</div>
			<div class="panel-body">
				{{ Form::open() }}
				<div class="form-group">
					{{ Form::label('user_correo', 'Usuario/Correo', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-10">
						{{ Form::text('user_correo', null, array('class' => 'form-control', 'placeholder' => 'Usuario/Correo...')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('contraseña', 'Contraseña', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-10">
						{{ Form::password('contraseña',  array('class' => 'form-control', 'placeholder' => 'Contraseña...')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('nombres', 'Nombres', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-10">
						{{ Form::text('nombres', null, array('class' => 'form-control', 'placeholder' => 'Nombres...')) }}
					</div>
				</div>

				<div class="form-group">
					{{ Form::label('apellidos', 'Apellidos', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-10">
						{{ Form::text('apellidos', null, array('class' => 'form-control', 'placeholder' => 'Apellidos...')) }}
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							{{ Form::label('vig_desde', 'Vigencia Desde', array('class' => 'col-sm-4 control-label')) }}
							<div class="col-sm-8">
								<div class="input-group">
									{{ Form::text('vig_desde', null, array('class'=> 'form-control', 'placeholder' => 'MM/DD/YYYY', 'id' => '')) }}
									<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							{{ Form::label('vig_hasta', 'Vigencia Hasta', array('class' => 'col-sm-4 control-label')) }}
							<div class="col-sm-8">
								<div class="input-group">
									{{ Form::text('vig_hasta', null, array('class'=> 'form-control', 'placeholder' => 'MM/DD/YYYY', 'id' => '')) }}
									<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							{{ Form::label('estado', 'Estado', array('class' => 'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{ Form::chosen('estado', array(), array('class' => 'form-control', 'data-placeholder' => 'Seleccione un estado...')) }}
								{{--<select data-placeholder="Seleccione un estado..." class="form-control chosen-select">--}}
								{{--<option value=""></option>--}}
								{{--<option value="United States">United States</option>--}}
								{{--<option value="United Kingdom">United Kingdom</option>--}}
								{{--<option value="Afghanistan">Afghanistan</option>--}}
								{{--<option value="Aland Islands">Aland Islands</option>--}}
								{{--</select>--}}
							</div>
						</div>
						<div class="col-md-6">
							{{ Form::label('perfil', 'Perfil', array('class' => 'col-sm-2 control-label')) }}
							<div class="col-sm-10">
								{{--{{ Form::chosenPerfiles('perfil', array('class' => 'form-control', 'data-placeholder' => 'Seleccione un perfil...')) }}--}}
                                <select data-placeholder="Seleccione un perfil..." class="form-control chosen-select">
                                    <option value=""></option>
                                    <option value="ad">Administrador</option>
                                    <option value="cc">Call Center</option>
                                    <option value="ej">Ejecutivo</option>
                                    <option value="ot">Otros</option>
                                </select>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-4">
						{{ Form::button('Aceptar', array('class' => 'btn btn-success btn-block')) }}
					</div>
					<div class="col-sm-4">
						{{ Form::button('Eliminar', array('class' => 'btn btn-warning btn-block')) }}
					</div>
					<div class="col-sm-4">
						 {{ HTML::link('dashboard/profile', 'Perfiles', array('class' => 'btn btn-danger btn-block'))  }}
					</div>
				</div>
				{{ Form::close() }}
			</div>
		</div>
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
{{ HTML::script('//code.jquery.com/ui/1.11.2/jquery-ui.js') }}
@endsection

@section('text-script')
<script>
    jQuery('input[name="contraseña"]').val('1234');
	jQuery('.chosen-select').chosen({'width': '100%', 'white-space': 'nowrap'});

	jQuery(function(jQuery){
		jQuery.datepicker.regional['es'] = {
			closeText: 'Cerrar',
			prevText: '<Ant',
			nextText: 'Sig>',
			currentText: 'Hoy',
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
			weekHeader: 'Sm',
			dateFormat: 'dd/mm/yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};
			jQuery.datepicker.setDefaults(jQuery.datepicker.regional['es']);
		}); 

	jQuery('input[name="vig_desde"]').datepicker({
		numberOfMonths: 1,
		onSelect: function(selected) {
			jQuery('input[name="vig_hasta"]').datepicker("option","minDate", selected)
		}
	});
	jQuery('input[name="vig_hasta"]').datepicker({ 
		numberOfMonths: 1,
		onSelect: function(selected) {
			jQuery('input[name="vig_desde"]').datepicker("option","maxDate", selected)
		}
	}); 
</script>

@endsection
