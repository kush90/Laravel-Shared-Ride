@extends('user_layout.master')
@section('title','Login')
@section('content')


    <div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        @if (session('success1'))
                            <div class="alert alert-danger">
                                {{ session('success1') }}
                            </div>
                        @endif

                    @if (session('email'))
                        <div class="alert alert-success">
                            {{ session('email') }}
                        </div>
                    @endif
                    @if (session('token'))
                        <div class="alert alert-success">
                            {{ session('token') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{url('forget/password')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
