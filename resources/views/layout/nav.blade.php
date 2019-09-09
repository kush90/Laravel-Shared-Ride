<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top " id="homenav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    @if(Auth::user()->hasRole('driver'))
                        <li><a href="{{url('driver/index')}}">Driver Dashboard</a></li>
                        @elseif(Auth::user()->hasRole('rider'))

                        <li><a href="{{url('rider/index')}}">Rider Dashboard</a></li>
                    @elseif(Auth::user()->hasRole('admin'))

                        <li><a href="{{url('admin/index')}}">Admin Dashboard</a></li>

                        @endif
                 @endif



                <li><a href="#about">ABOUT</a></li>
                <li><a href="#services">SERVICES</a></li>
                <li><a href="#contact">CONTACT</a></li>
                <li><div id="google_translate_element"></div>
                    </li>
                @if(Auth::check())
                <li><a href="{{url('user/logout')}}">Logout</a></li>

                @else
                    <li><a href="{{url('user/login')}}">Login</a></li>
                    @endif
            </ul>
        </div>
    </div>
</nav>