<div class="visible-xs hidden-sm hidden-md hidden-lg">
    <div class="media userlogged">
        {{ HTML::image('images/photos/loggeduser.png', null, array('class' => 'media-object')) }}
        <div class="media-body">
            <h4>{{ Session::get('user_name', 'Test user') }}</h4>
            <span>"... ?"</span>
        </div>
    </div>
    <h5 class="sidebartitle actitle">Cuenta</h5>
    <ul class="nav nav-pills nav-stacked nav-bracket mb30">
        <li><a href="{{ URL::to('#') }}"><i class="glyphicon glyphicon-user"></i>Mi perfil</a></li>
        <li><a href="{{ URL::to('#') }}"><i class="fa fa-cog"></i>Cuenta</a></li>
        <li><a href="{{ URL::to('#') }}"><i class="fa fa-question"></i>Ayuda</a></li>
        <li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i> Salir</a></li>
    </ul>
</div>
