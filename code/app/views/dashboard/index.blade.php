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
 <ul class="breadcrumb">
       <li ng-repeat="b in breadcrums" ng-class="{ active: $last }">@{{ b }} <span class="divider" ng-show="!$last">/</span></li>
        </ul>
  @{{ objeto.listFolder }}

  @{{ objeto.messageError }}
</div>
@endsection

@section('text-script')
<script type="text/javascript">
</script>
@endsection
