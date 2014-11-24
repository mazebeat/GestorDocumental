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
    <div ng-controller="profileController">
        {{ Form::open(array('url' => 'dashboard/profile', 'method' => 'POST', 'role' => 'form', 'id' => 'profileForm', 'name' => 'profileForm')) }}

        <div class="col-md-9">
            <div class="panel panel-dark">
                <div class="panel-heading">
                    <div class="panel-btns">
                        <a href="{{ URL::to('#') }}" class="panel-close">&times;</a>
                        <a href="{{ URL::to('#') }}" class="minimize">&minus;</a>
                    </div>
                    <h4 class="panel-title">Nuevo Perfil</h4>
                </div>
                <div class="panel-body">

                    <div class="form-group" ng-class="{ 'has-error': profileForm.nombre.$invalid, 'has-success' : !profileForm.nombre.$invalid }">
                        {{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder' => 'Nombre perfil...', 'ng-model' => 'profile.name', 'required')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="saveBtn" class="btn btn-success pull-right ladda-button" data-size="s" ng-disabled="profileForm.$invalid"><i class="fa fa-check fa-fw"></i>Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-btns">
                        <a href="{{ URL::to('#') }}" class="panel-close">&times;</a>
                        <a href="{{ URL::to('#') }}" class="minimize">&minus;</a>
                    </div>
                    <h4 class="panel-title">Permisos</h4>
                </div>
                <div class="panel-body">
                    <checkbox-group min-required="1">
                    <div class="form-group" ng-class="{ 'has-error': profileForm.permit.$invalid, 'has-success' : !profileForm.permit.$invalid }">
                        {{ Form::checkbox2('p_mantenedor', 'Mantenedor Usuarios', 'mu', 'primary', false, array('ng-model' => 'profile.permit.mu')) }}
                        {{ Form::checkbox2('p_estructura', 'Estructura Ambiente', 'ea', 'primary', false, array('ng-model' => 'profile.permit.ea')) }}
                        {{ Form::checkbox2('p_eliminar', 'Eliminar Cliente', 'ec', 'primary', false, array('ng-model' => 'profile.permit.ec')) }}
                        {{ Form::checkbox2('p_almacenar', 'Almacenar Información', 'ai', 'primary', false, array('ng-model' => 'profile.permit.ai')) }}
                        {{ Form::checkbox2('p_consultar', 'Consultar Información', 'ci', 'primary', false, array('ng-model' => 'profile.permit.ci')) }}
                        {{ Form::checkbox2('p_visualizar', 'Visualizar Documentos', 'vid', 'primary', false, array('ng-model' => 'profile.permit.vid')) }}
                        {{ Form::checkbox2('p_descargar', 'Descargar Documentos', 'dd', 'primary', false, array('ng-model' => 'profile.permit.dd')) }}
                        {{ Form::checkbox2('p_imprimir', 'Imprimir Documentos', 'id',  'primary', false, array('ng-model' => 'profile.permit.id')) }}
                        {{ Form::checkbox2('p_versionar', 'Versionar Documentos', 'ved', 'primary', false, array('ng-model' => 'profile.permit.ved')) }}
                    </div>
                </checkbox-group>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection

@section('file-style')
@endsection

@section('text-style')
<style>
    input[type='checkbox'].ng-invalid {
      outline: red solid 3px;
      padding: 5px;
  }
</style>
@endsection

@section('file-script')
@endsection

@section('text-script')
<script>
Ladda.bind('#saveBtn');
</script>
@endsection
