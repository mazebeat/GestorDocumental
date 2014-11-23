{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
<div ng-controller="treeViewController">
    <ul class="nav nav-pills nav-stacked nav-bracket">
        <li>
            {{ Form::open(array('url' => 'dashboard/years', 'method' => 'POST')) }}
            {{ Form::selectYear2('year', 2000, null, array('class' => 'form-control chosen-select', 'data-placeholder' => 'Seleccione un año...', 'ng-change' => 'buscarCarpeta()', 'ng-model' => 'year')) }}
            {{ Form::close() }}
        </li>
        <div ng-show="objeto.year"><strong>@{{ objeto.year }}</strong></div>
        <li>
            <div tree-view="objeto.structure" tree-view-options="options"></div>
            <div ng-show="objeto.messageError">
                <div class="alert alert-warning">
                    @{{ objeto.messageError }}
                </div>
            </div>
        </li>
    </ul>
</div>
{{--</div>--}}
{{--</div>--}}
