@extends('rider.layout.master')
@section('title','Driver Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="panel-title pull-left" style="font-size:30px;">Change your password</h1>
                    </div>
                </div>
                @if (session('change'))
                    <span class="help-block">
                                        <p class="alert alert-success text-center">{{ session('change') }}</p>
                                    </span>
                @endif
                <div class="panel panel-default">
                    <div class="panel-body">

                        <form id="tab2" class="form-horizontal frm2" method="post">
                            {{csrf_field()}}
                            <br>
                            <div class="form-group">
                                <div id="ss2" style="display: none;"></div>
                                <label class="control-label col-sm-3">Current Password</label>
                                <div class="col-md-5 col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="current_password" minlength="6" maxlength="10" id="current_password" placeholder="Enter your current password" value="">
                                    </div>

                                </div>
                                @if ($errors->has('current_password'))
                                    <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('current_password') }}</p>
                                    </span>
                                @endif
                                @if (session('success'))
                                    <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ session('success') }}</p>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">New Password</label>
                                <div class="col-md-5 col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="password" class="form-control" name="new_password" minlength="6" maxlength="10" id="new_password" placeholder="Enter your new password" value="">
                                    </div>

                                </div>
                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <p style="color:red;font-size: 12px;">*{{ $errors->first('new_password') }}</p>
                                    </span>
                                @endif
                            </div>
                            <input name="submit" type="submit" value="Change Your  Password" class="btn btn-primary pull-left">
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection