@extends('user_layout.master')
@section('title','Login')
@section('content')
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            @if (session('success'))
                <span class="help-block">
                                        <p class="alert alert-success text-center">{{session('success')}}</p>
                                    </span>
            @endif
                @if (session('warning'))
                    <span class="help-block">
                                        <p class="alert alert-warning text-center">{{session('warning')}}</p>
                                    </span>
                @endif
                @foreach($errors->all() as $error)
                    <span class="help-block">
                                        <p class="alert alert-danger text-center">{{$error}}</p>
                                    </span>
                    @endforeach
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Login</div>
                    <div style="float:right;  font-size: 80%; position: relative; top:-10px"><a href="{{url('forget/password')}}" style="color:white;">Forgot password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form id="loginform" class="form-horizontal"  method="post">
                         {{csrf_field()}}
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="email" class="form-control" name="email" value="" placeholder="Enter Your Email Address">
                        </div>

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Enter Your Password">
                        </div>






                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button type="submit" class="btn btn-primary ">Login</button>

                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account!
                                    <a href="{{url('driver/register')}}">
                                        Register  as a Driver
                                    </a>|
                                    <a href="{{url('rider/register')}}">
                                        Register as a Rider
                                    </a>

                                </div>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>

    </div>
    @endsection