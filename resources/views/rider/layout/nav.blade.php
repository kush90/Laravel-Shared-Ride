
<body>
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-default" id="homenav">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="#myPage">Logo</a>

                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">


                            <div class="outter"><img src="{{asset('profile/'.$im->profile)}}" class="image-circle"/></div>
                            {{$im->name}}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a style="font-size:12px;" href="{{url('rider/profile')}}">Profile<span class="fa fa-user-circle pull-right" aria-hidden="true" ></span></a></li>
                            <li><a style="font-size:12px;" href="{{url('rider/change/password')}}">Change Password<span class="fa fa-lock pull-right" aria-hidden="true" ></span></a></li>
                            <li><a style="font-size:12px;" href="{{url('rider/history')}}">Ride History<span class="fa fa-info-circle pull-right" aria-hidden="true" ></span></a></li>
                            <li><a style="font-size:12px;" href="{{url('user/logout')}}">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                        </ul>
                    </li>

                        </ul>
                    </li>

                        </ul>
                    </li>
                </ul>
            </div>

        </nav>

    </div>
</div>


