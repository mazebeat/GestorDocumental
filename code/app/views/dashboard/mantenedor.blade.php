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
				<div ng-controller="userFormController">
					{{ Form::open(array('url' => 'dashboard/form', 'method' => 'POST', 'role' => 'form', 'id' => 'userForm', 'name' => 'userForm')) }}

					<div class="form-group" ng-class="{ 'has-error': userForm.user_correo.$invalid, 'has-success' : !userForm.user_correo.$invalid }">
						{{ Form::label('user_correo', 'Usuario/Correo', array('class' => 'col-sm-2 control-label')) }}
						<div class="col-sm-10">
							{{ Form::text('user_correo', Input::old('user_correo'), array('class' => 'form-control', 'placeholder' => 'Usuario/Correo...', 'ng-model' => 'newUser.userCorreo', 'required', 'debounce' => '500')) }}
						</div>
					</div>
                    <div ng-show="!userForm.user_correo.$invalid">
                        <div class="form-group" ng-class="{ 'has-error': userForm.password.$invalid, 'has-success' : !userForm.password.$invalid }">
                            {{ Form::label('password', 'Contraseña', array('class' => 'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::password('password',  array('class' => 'form-control', 'placeholder' => 'Contraseña...', 'ng-model' => 'newUser.password', 'required', 'ng-init' => 'newUser.password="1234"')) }}
                            </div>
                        </div>

                        <div class="form-group" ng-class="{ 'has-error': userForm.nombres.$invalid, 'has-success' : !userForm.nombres.$invalid }">
                            {{ Form::label('nombres', 'Nombres', array('class' => 'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control', 'placeholder' => 'Nombres...', 'ng-model' => 'newUser.names', 'required')) }}
                            </div>
                        </div>

                        <div class="form-group" ng-class="{ 'has-error': userForm.apellidos.$invalid, 'has-success' : !userForm.apellidos.$invalid }">
                            {{ Form::label('apellidos', 'Apellidos', array('class' => 'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('apellidos', Input::old('apellidos'), array('class' => 'form-control', 'placeholder' => 'Apellidos...', 'ng-model' => 'newUser.lastNames', 'required')) }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error': userForm.vigDesde.$invalid, 'has-success' : !userForm.vigDesde.$invalid }">
                                    {{ Form::label('vigDesde', 'Vigencia Desde', array('class' => 'col-sm-4 control-label')) }}
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" id="vigDesde" name="vigDesde" class="form-control" placeholder="MM/DD/YYYY" ng-model="newUser.vigDesde" required datepicker value ="@{{startdt|date:'fullDate'}}" />
    {{--										{{ Form::text('vigDesde', Input::old('vigDesde'), array('class'=> 'form-control', 'placeholder' => 'MM/DD/YYYY', 'ng-model' => 'newUser.vigDesde', 'dp-model' => 'newUser.vigDesde', 'required', 'datepicker', 'value' => '@{{startdt|date:"fullDate"}}' )) }}--}}
                                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error': userForm.vigHasta.$invalid, 'has-success' : !userForm.vigHasta.$invalid }">
                                    {{ Form::label('vigHasta', 'Vigencia Hasta', array('class' => 'col-sm-4 control-label')) }}
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            {{ Form::text('vigHasta', Input::old('vigHasta'), array('class'=> 'form-control', 'placeholder' => 'MM/DD/YYYY', 'ng-model' => 'newUser.vigHasta', 'dp-model' => 'newUser.vigHasta', 'required', 'datepicker')) }}
                                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error': userForm.estado.$invalid, 'has-success' : !userForm.estado.$invalid }">
                                    {{ Form::label('estado', 'Estado', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{--{{ Form::chosen('estado', array(), array('class' => 'form-control', 'data-placeholder' => 'Seleccione un estado...', 'ng-model' => 'newUser.state', 'required')) }}--}}
                                        <select id="estado" name="estado" data-placeholder="Seleccione un estado..." class="form-control chosen-select" ng-model="newUser.state" required>
                                            <option value=""></option>
                                            <option value="ac">Activo</option>
                                            <option value="in">Inactivo</option>
                                            <option value="el">Eliminado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" ng-class="{ 'has-error': userForm.perfil.$invalid, 'has-success' : !userForm.perfil.$invalid }">
                                    {{ Form::label('perfil', 'Perfil', array('class' => 'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        {{--									{{ Form::chosenPerfiles('perfil', array('class' => 'form-control', 'data-placeholder' => 'Seleccione un perfil...', 'ng-model' => 'user.profile')) }}--}}
                                        <select id="perfil" name="perfil" data-placeholder="Seleccione un perfil..." class="form-control chosen-select" ng-model="newUser.profile" required>
                                            <option value=""></option>
                                            <option value="ad">Administrador</option>
                                            <option value="cc">Call Center</option>
                                            <option value="gt">Gestión</option>
                                            <option value="pr">Presencial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
						<div class="col-sm-4">
						    <button type="submit" id="saveBtn" class="btn btn-success btn-block ladda-button" ng-disabled="userForm.$invalid" data-size="s"><i class="fa fa-check fa-fw"></i>Aceptar</button>
						</div>
						<div class="col-sm-4">
							<button id="deleteBtn" class="btn btn-warning btn-block ladda-button" ng-disabled='userForm.user_correo.$invalid' data-size="s"><i class="fa fa-trash-o fa-fw"></i>Eliminar</button>
						</div>
						<div class="col-sm-4">
							<a href="{{ URL::to('dashboard/profile') }}" id="profileBtn" class="btn btn-danger btn-block ladda-button" data-size="s"><i class="fa fa-unlock-alt fa-fw"></i>Perfiles</a>
						</div>
					</div>
					{{ Form::close() }}
				</div>
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
Ladda.bind('#saveBtn');
Ladda.bind('#deleteBtn');
Ladda.bind('#profileBtn');

//	jQuery(function(jQuery){
//		jQuery.datepicker.regional['es'] = {
//			closeText: 'Cerrar',
//			prevText: '<Ant',
//			nextText: 'Sig>',
//			currentText: 'Hoy',
//			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
//			monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
//			dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
//			dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
//			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
//			weekHeader: 'Sm',
//			dateFormat: 'dd/mm/yy',
//			firstDay: 1,
//			isRTL: false,
//			showMonthAfterYear: false,
//			yearSuffix: ''};
//			jQuery.datepicker.setDefaults(jQuery.datepicker.regional['es']);
//		});
//
//	jQuery('input[name="vigDesde"]').datepicker({
//		numberOfMonths: 1,
//		onSelect: function(selected) {
//			jQuery('input[name="vigHasta"]').datepicker("option","minDate", selected)
//		}
//	});
//	jQuery('input[name="vigHasta"]').datepicker({
//		numberOfMonths: 1,
//		onSelect: function(selected) {
//			jQuery('input[name="vigDesde"]').datepicker("option","maxDate", selected)
//		}
//	});
</script>
@endsection
