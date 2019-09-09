@extends('rider.layout.master')
@section('title','Driver Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <p class="alert alert-danger text-center">List of your ride history</p>

                @if(!empty($booked_ride))
                @for($i=0;$i<count($booked_ride);$i++)
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <p style="cursor: pointer;font-size: 13px;" data-toggle="collapse" data-parent="#accordion" href="#collapse"><span class="fa fa-car">
                            </span> &nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>
                                    &nbsp;&nbsp;{{$booked_ride[$i][2]}}&nbsp; - &nbsp;{{$booked_ride[$i][3]}}
                                    &nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;{{$booked_ride[$i][4]}}
                                    &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;{{$booked_ride[$i][5]}}

                                    &nbsp;&nbsp; by &nbsp;<i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                                    @foreach($users as $user)
                                        @if($booked_ride[$i][1]==$user->id)
                                    {{$user->name}}
                                        @endif
                                        @endforeach
                                </p>
                            </h4>
                        </div>
                    </div>
                </div>
                    @endfor
                    @endif
    </div>
    </div>
    </div>
    @endsection