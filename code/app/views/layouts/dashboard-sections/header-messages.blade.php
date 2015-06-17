<div class="btn-group">
    <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
        <i class="glyphicon glyphicon-envelope"></i>
        <span class="badge">1</span>
    </button>
    <div class="dropdown-menu dropdown-menu-head pull-right">
        <h5 class="title">You Have 1 New Message</h5>
        <ul class="dropdown-list gen-list">
            <li class="new">
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user1.png') }}</span>
					<span class="desc">
						<span class="name">Draniem Daamul <span class="badge badge-success">new</span></span>
						<span class="msg">Lorem ipsum dolor sit amet...</span>
					</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user2.png') }}</span>
					<span class="desc">
						<span class="name">Nusja Nawancali</span>
						<span class="msg">Lorem ipsum dolor sit amet...</span>
					</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user3.png') }}</span>
					<span class="desc">
						<span class="name">Weno Carasbong</span>
						<span class="msg">Lorem ipsum dolor sit amet...</span>
					</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user4.png') }}</span>
					<span class="desc">
						<span class="name">Zaham Sindilmaca</span>
						<span class="msg">Lorem ipsum dolor sit amet...</span>
					</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('#') }}">
                    <span class="thumb">{{ HTML::image('images/photos/user5.png') }}</span>
					<span class="desc">
						<span class="name">Veno Leongal</span>
						<span class="msg">Lorem ipsum dolor sit amet...</span>
					</span>
                </a>
            </li>
            <li class="new"><a href="{{ URL::to('#') }}">Read All Messages</a></li>
        </ul>
    </div>
</div>		