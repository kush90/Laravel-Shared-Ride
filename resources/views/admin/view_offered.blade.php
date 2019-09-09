@extends('admin.layout.master')
@section('title','Admin Dashboard')
@section('content')
    <style>
        .panel-default>.panel-heading {
            color: black;

            border-color: #ddd;
        }
    </style>

    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="mini-submenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <div class="list-group">
                  <span href="#" class="list-group-item " style="background: #f4511e;color:white;">
                             Submenu

                     </span>
                    <a href="{{url('admin/index')}}" class="list-group-item ">
                        <i class="fa fa-users"></i>&nbsp;&nbsp;View users
                    </a>
                    <a href="{{url('admin/view/offered')}}" class="list-group-item">
                        <i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;View offered rides
                    </a>

                </div>
            </div>

            <div class="col-md-8">
<?php $i=0; ?>
                @foreach($offers as $offer)
                   @if($i==0)
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <p style="cursor: pointer;font-size: 13px;" data-toggle="collapse" data-parent="#accordion" href="#collapse0"><span class="fa fa-car">
                            </span> &nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>
                                &nbsp;&nbsp;{{$offer->from}}&nbsp; - &nbsp;{{$offer->to}}
                                &nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;{{$offer->date}}
                                &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;{{$offer->time}}

                               &nbsp;&nbsp; by &nbsp;<i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                                @foreach($users as $user)
                                    @if($user->id==$offer->user_id)
                                        {{$user->name}}
                                    @endif

                                @endforeach
                            </p>
                        </h4>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse in ">
                        <h3 class="text-center" style="font-size: 14px;">Who joined for this ride.</h3>
                        <div class="panel-body">

                            <ul style="list-style: none;">
                                @foreach($bookrides as $br)
                                    @if($offer->id==$br->offer_id)
                                        @foreach($users as $user)
                                            @if($user->id==$br->user_id)
                                        <li style="float:left;padding: 10px;"><a type="button" class="btn btn-primary"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;{{$user->name}}</a></li>
                                            @endif
                                        @endforeach
                                        @endif

                                    @endforeach

                            </ul>
                        </div>
                    </div>
                </div>


            </div>
                       @else
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <p style="cursor: pointer;font-size: 13px;" data-toggle="collapse" data-parent="#accordion" href="#collapse".$i><span class="fa fa-car">
                            </span> &nbsp;&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>
                                &nbsp;&nbsp;{{$offer->from}}&nbsp; - &nbsp;{{$offer->to}}
                                &nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;{{$offer->date}}
                                &nbsp;&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp;{{$offer->time}}

                                &nbsp;&nbsp; by &nbsp;<i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;
                                @foreach($users as $user)
                                    @if($user->id==$offer->user_id)
                                {{$user->name}}
                                    @endif

                                    @endforeach
                            </p>
                        </h4>
                    </div>
                    <div id="collapse".$i class="panel-collapse collapse ">
                        <h3 style="font-size: 14px;"  class="text-center">Who joined for this ride.</h3>
                        <div class="panel-body">

                            <ul style="list-style: none;">
                                @foreach($bookrides as $br)
                                    @if($offer->id==$br->offer_id)
                                        @foreach($users as $user)
                                            @if($user->id==$br->user_id)
                                                <li style="float:left;padding: 10px;"><a type="button" class="btn btn-primary"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;&nbsp;{{$user->name}}</a></li>
                                            @endif
                                        @endforeach
                                    @endif

                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>


            </div>
                       @endif

  <?php $i++; ?>
                    @endforeach

             </div>
    </div>
    </div>



@endsection
