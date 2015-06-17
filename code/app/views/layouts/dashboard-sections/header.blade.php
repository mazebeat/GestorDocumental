<a class="menutoggle"><i class="fa fa-bars"></i></a>
<div ng-controller="searchController">
    {{ Form::open(array('url' => 'dashboard/search', 'method' => 'POST', 'class' => 'searchform', 'id' => 'searchform')) }}
    {{ Form::text('keyword', null, array('class' => 'form-control', 'placeholder' => 'Busca aquí...', 'ng-model' => 'keyword', 'ng-change' => 'change(keyword)')) }}
    {{ Form::close() }}
    {{--<li ng-repeat="entry in entries">--}}
    {{--<span class=""><a href="#">@{{keyword}}</a></span>--}}
    {{--</li>--}}
</div>
<div class="header-right">
    <ul class="headermenu">
        <li>
            <a href="{{ URL::to('dashboard/form') }}" class="btn btn-danger tp-icon"><i class="fa fa-bolt"></i> <span>Dashboard</span></a>
        </li>
        {{--<li>--}}
        {{--@include('layouts.dashboard-sections.header-newusers')--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--@include('layouts.dashboard-sections.header-messages')--}}
        {{--</li>--}}
        {{--<li>--}}
        {{--@include('layouts.dashboard-sections.header-notifications')--}}
        {{--</li>--}}
        <li>
            @include('layouts.dashboard-sections.user-profile')
        </li>
        <li>
            <button id="chatview" class="btn btn-default tp-icon chat-icon">
                <i class="fa fa-cogs"></i>
            </button>
            {{--<button type="button" class="navbar-toggle" data-toggle="sidebar" data-target=".sidebar">--}}
            {{--<i class="fa fa-cogs"></i>--}}
            {{--</button>--}}
        </li>
    </ul>
</div><!-- header-right -->
