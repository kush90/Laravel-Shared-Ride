@extends('user_layout.master')
@section('title','Register')
@section('content')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                    @if (session('success'))
                        <span class="help-block">
                                        <p class="alert alert-danger text-center">{{session('success')}}</p>
                                    </span>
                    @endif
                <h2 class="text-center">Sign Up</h2>

                <hr>
                <form class="form-horizontal" method="post"  enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email ID <span class="text-danger">*</span></label>
                        <div class="col-md-5 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="email" class="form-control" name="email" id="emailid" placeholder="Enter your Email ID" value="">

                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('email') }}</p>
                                    </span>
                            @endif


                            <small> Your Email Id is being used for ensuring the security of your account, authorization and access recovery. </small> </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Set Password <span class="text-danger">*</span></label>
                        <div class="col-md-5 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" name="password" minlength="6" maxlength="10" id="password" placeholder="Choose password (6-10 chars)" value="">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('password') }}</p>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Confirm Password <span class="text-danger">*</span></label>
                        <div class="col-md-5 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password"  minlength="6" maxlength="10" class="form-control" name="password_confirmation" id="cpassword" placeholder="Confirm your password" value="">
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('password_confirmation') }}</p>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Full Name <span class="text-danger">*</span></label>
                        <div class="col-md-5 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                                <input type="text" id="color" class="form-control" name="name" placeholder="Enter your Full Name" style="height: 30px;"/>

                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('name') }}</p>
                                    </span>
                            @endif

                        </div>


                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Gender <span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <label>
                                <input name="gender" name="gender" type="radio" value="Male" checked>
                                Male </label>
                               
                            <label>
                                <input name="gender" name="gender" type="radio" value="Female" >
                                Female </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Contact No. <span class="text-danger">*</span></label>
                        <div class="col-md-5 col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="number" class="form-control" name="phone" id="contactnum" placeholder="Enter your Primary contact no." value="">
                            </div>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('phone') }}</p>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Profile Photo<span class="text-danger">*</span>
                        </label>
                        <div class="col-md-5 col-sm-8">
                            <div class="input-group" id="f"> <span class="input-group-addon" id="file_upload"><i class="fa fa-picture-o" aria-hidden="true"></i></span>

                                <input type="file" style="padding:3px;" name="profile"  id="file_nm" class="form-control upload " placeholder="" aria-describedby="file_upload">
                            </div>
                            @if ($errors->has('profile'))
                                <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('profile') }}</p>
                                    </span>
                            @endif
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-md-8 col-sm-9"><span class="text-muted"><span class="label label-danger">Note:-</span> By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Policy</a></span> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-10">
                            <input name="submit" type="submit" value="Sign Up" class="btn btn-primary">
                        </div>
                    </div>

</form>
            </div>
            </div>
            </div>

    @endsection