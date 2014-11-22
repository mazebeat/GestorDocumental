{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
<div ng-controller="treeViewController">
  <ul class="nav nav-pills nav-stacked nav-bracket">
    <li>
      {{ Form::open(array('url' => 'dashboard/years', 'method' => 'POST')) }}
      {{ Form::selectYear2('year', 2000, null, array('class' => 'form-control chosen-select', 'data-placeholder' => 'Seleccione un año...', 'ng-change' => 'buscarCarpeta()', 'ng-model' => 'year')) }}
      {{ Form::close() }}
    </li>
    <div><strong>@{{ year }}</strong></div>
    <li>
      <div tree-view="structure" tree-view-options="options"></div>
      <div ng-show="error">
          <div class="alert alert-warning">
            @{{ message }}
          </div>
      </div>
          <input type="text" name="cliente" id="cliente" ng-model="cliente"/>
         @{{ objeto }}
    </li>
    {{--<div style="padding: 10px; border: 1px solid #aaa;">--}}
    {{--<div>Root</div>--}}
    {{--<div tree-view="structure" tree-view-options="options3"></div>--}}
    {{--</div>--}}
  </ul>
</div>
{{--</div>--}}
{{--</div>--}}
