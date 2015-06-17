<div class="visible-xs hidden-sm hidden-md hidden-lg">
	<div class="media userlogged">
		{{ HTML::image('images/photos/loggeduser.png', null, array('class' => 'media-object')) }}
		<div class="media-body">
			<h4>{{ Auth::user()->name }}</h4>
			<span>"..."</span>
		</div>
	</div>
	<h5 class="sidebartitle actitle">Cuenta</h5>
	<ul class="nav nav-pills nav-stacked nav-bracket mb30">
		<li><a href="{{ URL::to('#') }}"><i class="glyphicon glyphicon-user fa-fw"></i>&nbsp;Mi perfil</a></li>
		<li><a href="{{ URL::to('#') }}"><i class="fa fa-cog fa-fw"></i>&nbsp;Cuenta</a></li>
		<li><a href="{{ URL::to('#') }}"><i class="fa fa-question fa-fw"></i>&nbsp;Ayuda</a></li>
		<li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Salir</a></li>
	</ul>
</div>
