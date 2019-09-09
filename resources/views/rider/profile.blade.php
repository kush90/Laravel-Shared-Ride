@extends('rider.layout.master')
@section('title','Driver Dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;">My basic profile</h1>
                    </div>
                </div>
                @if(session('success'))
                   <p class="alert alert-success text-center"> {{session('success')}}</p>
                @endif
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                            <label for="email">Email Account</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{$im->email}}" readonly>
                            <label for="fullname">Full name</label>
                            <input type="text" class="form-control" id="fullname" name="name"  value="{{$im->name}}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('name') }}</p>
                                    </span>
                            @endif
                            <label for="phone">Contact Number</label>
                            <input type="number" class="form-control" id="phone" name="phone" value="{{$im->phone}}">
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('phone') }}</p>
                                    </span>
                        @endif

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="panel-title pull-left">Your photo</h3>
                        <br><br>
                        <div align="center">
                            <div class="col-lg-12 col-md-12">
                                <img class="img-thumbnail img-responsive" src="{{asset('profile/'.$im->profile)}}" width="300px" height="300px">
                            </div>
                            <div class="col-lg-6 col-md-4 col-lg-offset-3">
                                <div class="input-group" id="f"> <span class="input-group-addon" id="file_upload"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
                                    <input type="file" style="padding:3px;" name="profile"  id="file_nm" class="form-control upload " placeholder="" aria-describedby="file_upload">
                                    <input type="hidden" name="profile1" value="{{$im->profile}}">
                                </div>
                               </div>

                        </div>
                    </div>
                </div>
                <a href="{{url('rider/index')}}" class="btn btn-default"><i class="fa fa-fw fa-times" aria-hidden="true"></i> Cancel</a>
                <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-check" aria-hidden="true"></i> Update Profile</button>
                </form>
            </div>


        </div>
    </div>

@endsection