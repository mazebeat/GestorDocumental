<form method="post" action="http://themepixels.com/demo/webpage/bracket/index.html">
	<h4 class="nomargin">Sign In</h4>
	<p class="mt5 mb20">Login to access your account.</p>

	<input type="text" class="form-control uname" placeholder="Username" />
	<input type="password" class="form-control pword" placeholder="Password" />
	<a href="{{ URL::to('#') }}"><small>Forgot Your Password?</small></a>
	<button class="btn btn-success btn-block">Sign In</button>
</form>
