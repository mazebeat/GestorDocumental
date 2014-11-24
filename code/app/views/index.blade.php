@extends('layouts.double')

@section('title')
Signin
@endsection

@section('text-style')
<style>
</style>
@endsection

@section('file-style')
{{ HTML::style('css/jquery.gritter.css') }}
@endsection

@section('left-side')
<div class="signin-info">
    <div class="logopanel">
        <h1><span><i class="fa fa-angle-double-right"></i></span> Gestor Documental </h1>
    </div>
    <div class="mb20"></div>
    <h5><strong>Bienvenido al Gestor Documental de Movistar</strong></h5>
    <div class="mb20"></div>
    <div class="row">
        <div class="col-md-9">
            <span class="">{{ HTML::image('images/logos/signin.png', 'Movistar', array('class' => 'img-responsive')) }}</span>
        </div>
    </div>
</div>
@endsection

@section('right-side')
<div ng-controller="signInController">
    {{-- Open form --}}
    {{ Form::open(array('url' => '/', 'method' => 'POST', 'id' => 'loginForm', 'name' => 'loginForm', 'ng-submit' => 'loginFormSubmit()'))}}
    <h4 class="nomargin">Inicio de Sesión</h4>
    <p class="mt5 mb20">Accede a tu cuenta por este medio.</p>
    {{-- Username input --}}
    <div class="form-group"
    ng-class="{ 'has-error': loginForm.username.$invalid, 'has-success' : !loginForm.username.$invalid }">
    {{ Form::text('username', null, array('class' => 'form-control uname ng-dirty ng-invalid', 'placeholder' => 'Usuario', 'required', 'ng-model' => 'user.username', 'debounce' => '500')) }}
</div>
{{-- Password input --}}
<div class="form-group" ng-class="{ 'has-error': loginForm.password.$invalid, 'has-success' : !loginForm.password.$invalid }">
    {{ Form::password('password', array('class' => 'form-control pword ng-dirty ng-invalid', 'placeholder' => 'Contraseña', 'required', 'ng-model' => 'user.password')) }}
</div>
{{-- Loading directive --}}
{{--<loading></loading>--}}

{{-- Password input --}}
<a href="{{ URL::to('#') }}" data-toggle="modal" data-target="#forgotPass"><small>Olvidaste tu contraseña?</small></a>
{{ Form::button('Iniciar Sesión', array('id' => 'loginFormButton', 'class' =>'btn btn-success btn-block ladda-button', 'data-style' =>'expand-right', 'data-size' => 's', 'ng-disabled' => 'loginForm.$invalid',  'ng-click' => 'signInOne()')) }}
{{-- Close form --}}
{{ Form::close() }}

{{-- Remeber password modal --}}
<div class="modal fade" id="forgotPass" tabindex="-1" role="dialog" aria-labelledby="forgotPass" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Recuperar contraseña</h4>
            </div>
            <div class="modal-body">
                Por favor contactar con el Administrador
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profileList" tabindex="-1" role="dialog" aria-labelledby="profilList" aria-hidden="true" ng-show="perfilesFromQuery">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Bienvenido usuario</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h4>Seleccione un perfil:</h4>
                    {{ Form::open(array('url' => 'loginFinish', 'method' => 'POST', 'id' => 'loginFinish', 'name' => 'loginFinish', 'ng-submit' => 'loginFormSubmit()', 'style' => 'border: 0; padding: 0;')) }}
                    <div class="col-md-9">
                        {{--Profile input --}}
                        <div class="form-group">
                            <select
                            id="profile"
                            name="profile"
                            class="form-control chosen-select ng-dirty ng-invalid"
                            required
                            chosen
                            disable-search="true"
                            allow-single-deselect="true"
                            data-placeholder="Seleccione un perfil..."
                            no-results-text="'Usuario sin perfil asociado'"
                            ng-model="user.profile"
                            ng-options="p.code as p.name for p in perfilesFromQuery">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    {{ Form::button('Aceptar', array('id' => 'loginFinishButton', 'class' => 'btn btn-primary ladda-button', 'data-style' =>'expand-right', 'data-size' => 's', 'style' => 'margin-top: 0;','ng-disabled' => 'loginFinish.$invalid', 'ng-click' => 'signInTwo()')) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@section('file-script')

@endsection

@section('text-script')
<script type="text/javascript">
// Create a new instance of ladda for the specified button
var init = Ladda.create(document.querySelector('#loginFormButton'));
var finish = Ladda.create(document.querySelector('#loginFinishButton'));

jQuery('#loginForm').submit(function(){
    return false;
});

jQuery('#loginFinish').submit(function(){
    return false;
});

// Bind normal buttons
Ladda.bind( '.ladda-button');

@if($errors->any())
@foreach($errors->all() as $error)
jQuery.gritter.add({
    title: 'Error: ',
    text: '{{ $error  }}',
    class_name: 'growl-warning',
    time: '',
    sticky: false
});
@endforeach
@endif
</script>
@endsection

