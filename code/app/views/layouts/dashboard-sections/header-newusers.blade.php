<div class="btn-group">
    <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
        <i class="glyphicon glyphicon-user"></i>
        <span class="badge">2</span>
    </button>
    <div class="dropdown-menu dropdown-menu-head pull-right">
        <h5 class="title">2 Newly Registered Users</h5>
        <ul class="dropdown-list user-list">
            <li class="new">
                <div class="thumb"><a href="{{ URL::to('#') }}">{{ HTML::image('images/photos/user1.png') }}</a></div>
                <div class="desc">
                    <h5><a href="{{ URL::to('#') }}">Draniem Daamul (@draniem)</a> <span
                                class="badge badge-success">new</span></h5>
                </div>
            </li>
            <li class="new">
                <div class="thumb"><a href="{{ URL::to('#') }}">{{ HTML::image('images/photos/user2.png') }}</a></div>
                <div class="desc">
                    <h5><a href="{{ URL::to('#') }}">Zaham Sindilmaca (@zaham)</a> <span
                                class="badge badge-success">new</span></h5>
                </div>
            </li>
            <li>
                <div class="thumb"><a href="{{ URL::to('#') }}">{{ HTML::image('images/photos/user3.png') }}</a></div>
                <div class="desc">
                    <h5><a href="{{ URL::to('#') }}">Weno Carasbong (@wenocar)</a></h5>
                </div>
            </li>
            <li>
                <div class="thumb"><a href="{{ URL::to('#') }}">{{ HTML::image('images/photos/user4.png') }}</a></div>
                <div class="desc">
                    <h5><a href="{{ URL::to('#') }}">Nusja Nawancali (@nusja)</a></h5>
                </div>
            </li>
            <li>
                <div class="thumb"><a href="{{ URL::to('#') }}">{{ HTML::image('images/photos/user5.png') }}</a></div>
                <div class="desc">
                    <h5><a href="{{ URL::to('#') }}">Lane Kitmari (@lane_kitmare)</a></h5>
                </div>
            </li>
            <li class="new"><a href="{{ URL::to('#') }}">See All Users</a></li>
        </ul>
    </div>
</div>