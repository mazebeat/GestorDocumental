<div class="btn-group">
    <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
        <i class="glyphicon glyphicon-globe"></i>
        <span class="badge">5</span>
    </button>
    <div class="dropdown-menu dropdown-menu-head pull-right">
        <h5 class="title">You Have 5 New Notifications</h5>
        <ul class="dropdown-list gen-list">
            <li class="new">
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user4.png') }}</span>
					<span class="desc">
						<span class="name">Zaham Sindilmaca <span class="badge badge-success">new</span></span>
						<span class="msg">is now following you</span>
					</span>
                </a>
            </li>
            <li class="new">
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user5.png') }}</span>
					<span class="desc">
						<span class="name">Weno Carasbong <span class="badge badge-success">new</span></span>
						<span class="msg">is now following you</span>
					</span>
                </a>
            </li>
            <li class="new">
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user3.png') }}</span>
					<span class="desc">
						<span class="name">Veno Leongal <span class="badge badge-success">new</span></span>
						<span class="msg">likes your recent status</span>
					</span>
                </a>
            </li>
            <li class="new">
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user3.png') }}</span>
					<span class="desc">
						<span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
						<span class="msg">downloaded your work</span>
					</span>
                </a>
            </li>
            <li class="new">
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user3.png') }}</span>
					<span class="desc">
						<span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
						<span class="msg">send you 2 messages</span>
					</span>
                </a>
            </li>
            <li class="new"><a href="{{ URL::to('#') }}">See All Notifications</a></li>
        </ul>
    </div>
</div>