<div class="hidden-xs">
	<div class="btn-group">
		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			{{ HTML::image('images/photos/loggeduser.png') }}
			{{ Auth::user()->name }}
			<span class="caret"></span>
		</button>
		<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
			<li><a href="{{ URL::to('#') }}"><i class="glyphicon glyphicon-user fa-fw"></i>&nbsp;Mi perfil</a></li>
			<li><a href="{{ URL::to('#') }}"><i class="fa fa-cog fa-fw"></i>&nbsp;Cuenta</a></li>
			<li><a href="{{ URL::to('#') }}"><i class="fa fa-question fa-fw"></i>&nbsp;Ayuda</a></li>
			<li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Salir</a></li>
		</ul>
	</div>
</div>
