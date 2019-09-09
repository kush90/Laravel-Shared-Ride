@extends('admin.layout.master')
@section('title','Admin Dashboard')
@section('content')
    <style>
        /*    --------------------------------------------------
	:: General
	-------------------------------------------------- */
        body {
            font-family: 'Open Sans', sans-serif;
            color: #353535;
        }
        .content h1 {
            text-align: center;
        }
        .content .content-footer p {
            color: #6d6d6d;
            font-size: 12px;
            text-align: center;
        }
        .content .content-footer p a {
            color: inherit;
            font-weight: bold;
        }

        /*	--------------------------------------------------
            :: Table Filter
            -------------------------------------------------- */
        .panel {
            border: 1px solid #ddd;
            background-color: #fcfcfc;
        }
        .panel .btn-group {
            margin: 15px 0 30px;
        }
        .panel .btn-group .btn {
            transition: background-color .3s ease;
        }
        .table-filter {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }
        .table-filter tbody tr:hover {
            cursor: pointer;
            background-color: #eee;
        }
        .table-filter tbody tr td {
            padding: 10px;
            vertical-align: middle;
            border-top-color: #eee;
        }
        .table-filter tbody tr.selected td {
            background-color: #eee;
        }
        .table-filter tr td:first-child {
            width: 38px;
        }
        .table-filter tr td:nth-child(2) {
            width: 35px;
        }
        .ckbox {
            position: relative;
        }
        .ckbox input[type="checkbox"] {
            opacity: 0;
        }
        .ckbox label {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .ckbox label:before {
            content: '';
            top: 1px;
            left: 0;
            width: 18px;
            height: 18px;
            display: block;
            position: absolute;
            border-radius: 2px;
            border: 1px solid #bbb;
            background-color: #fff;
        }
        .ckbox input[type="checkbox"]:checked + label:before {
            border-color: #2BBCDE;
            background-color: #2BBCDE;
        }
        .ckbox input[type="checkbox"]:checked + label:after {
            top: 3px;
            left: 3.5px;
            content: '\e013';
            color: #fff;
            font-size: 11px;
            font-family: 'Glyphicons Halflings';
            position: absolute;
        }
        .table-filter .star {
            color: #ccc;
            text-align: center;
            display: block;
        }
        .table-filter .star.star-checked {
            color: #F0AD4E;
        }
        .table-filter .star:hover {
           color: #ccc;
        }
        .table-filter .star.star-checked:hover {
            color: #F0AD4E;
        }
        .table-filter .media-photo {
            width: 45px;
        }
        .table-filter .media-body {
           /* display: block;*/
            /* Had to use this style to force the div to expand (wasn't necessary with my bootstrap version 3.3.6) */
        }
        .table-filter .media-meta {
            font-size: 11px;
            color: #999;
        }
        .table-filter .media .title {
            color: #2BBCDE;
            font-size: 14px;
            font-weight: bold;
            line-height: normal;
            margin: 0;
        }
        .table-filter .media .title span {
            font-size: .8em;
            margin-right: 20px;
        }
        .table-filter .media .title span.pagado {
            color: #5cb85c;
        }
        .table-filter .media .title span.pendiente {
            color: #f0ad4e;
        }
        .table-filter .media .title span.cancelado {
            color: #d9534f;
        }
        .table-filter .media .summary {
            font-size: 12px;
            display: inline-block;
        }
        .modal {
            position: fixed;
            top: 81px;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;

        }



    </style>
    <div class="container">



        <!----review modal---->

        <div class="modal fade" id="reviewm" tabindex="-1" role="dialog" aria-labelledby="reviewm" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead>
                                <tr>

                                    <th>Review By</th>
                                    <th>Review</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody id="sr">

                                </tbody>
                            </table>
                        </div>



                </div>
            </div>
        </div>
            </div>
        <!----review modal---->





        <!----modal---->

        <div class="modal fade" id="lience" tabindex="-1" role="dialog" aria-labelledby="lience" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <img src="{{asset('profile/'.'a.jpg')}}" alt="" id="ml" class="img img-responsive">
                    </div>
                    
                </div>
            </div>
        </div>
        <!----modal---->


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

                <section class="content">

                @if(session('success'))
                    <p class="alert alert-success">{{session('success')}}</p>
                    @endif
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-filter" data-target="riders">Riders</button>
                                        <button type="button" class="btn btn-warning btn-filter" data-target="drivers">Drivers</button>

                                    </div>
                                </div>
                                <div class="table" >
                                    <table class="table table-filter">
                                        <tbody>
                                        @if(!$rider_users->isEmpty())
                                        @foreach($rider_users as $rider_user)
                                            <tr data-status="riders">


                                                <td>
                                                    <div class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{asset('profile/'.$rider_user->profile)}}" class="media-photo img-responsive">
                                                        </a>
                                                        <div class="media-body">
                                                            <span class="media-meta pull-right">{{$rider_user->created_at}}</span>
                                                            <h4 class="title">
                                                                {{$rider_user->name}}
                                                                <span class="pull-right pendiente">(Rider)</span>
                                                            </h4>
                                                            <p class="summary"><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;{{$rider_user->phone}}</p>
                                                            <p class="summary">&nbsp;&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;{{$rider_user->email}}</p>



                                                            <p class="summary">&nbsp;&nbsp;<a id="{{$rider_user->id}}" class="btn btn-danger d" href="{{action('Admin\AdminController@delete',$rider_user->id) }}">&nbsp;Delete</a></p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif

                                        @if(!$driver_users->isEmpty())
                                        @foreach($driver_users as $driver_user)
                                        <tr data-status="drivers">


                                            <td>
                                                <div class="media">
                                                    <a href="#" class="pull-left">
                                                        <img src="{{asset('profile/'.$driver_user->profile)}}" class="media-photo img-responsive">

                                                    </a>
                                                    <div class="media-body">
                                                        <span class="media-meta pull-right">{{$driver_user->created_at}}</span>
                                                        <h4 class="title">
                                                            {{$driver_user->name}}
                                                            <p class="summary"><a href="" style="font-size: 14px;" >

                                                                        @for($j=0;$j<count($review_users);$j++)
                                                                            @if($review_users[$j][0]==$driver_user->id)
                                                                            <span class="pagado rm" id="{{$review_users[$j][0]}}" data-toggle="modal" data-target="#reviewm">Reviews {{$review_users[$j][1]}} </span>
                                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                            @endif
                                                                        @endfor

                                                                   </a></p>
                                                            <span class="pull-right pendiente">(Driver)</span>
                                                        </h4>
                                                        <p class="summary"><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;{{$driver_user->phone}}</p>
                                                        <p class="summary">&nbsp;&nbsp;<i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;{{$driver_user->email}}</p>
                                                        <p class="summary">&nbsp; <i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;{{$driver_user->carnumber}}</p>
                                                        <p class="summary">&nbsp; <i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;{{$driver_user->typeofcar}}</p>
                                                        <p class="summary">&nbsp; <i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;<span style="background-color:red;display: inline-block;width:30px;height:10px;"></span></p>
                                                        <p class="summary">&nbsp;&nbsp;<button id="{{$driver_user->lience}}" class="btn btn-default l" data-toggle="modal" data-target="#lience"
                                                                    href=""> <i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;Lience</button></p>

                                                        <p class="summary">&nbsp;&nbsp;<a id="{{$driver_user->id}}" class="btn btn-danger d" href="{{action('Admin\AdminController@delete',$driver_user->id)}}">&nbsp;Delete</a></p>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach

                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                </section>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function () {

    $('.star').on('click', function () {
    $(this).toggleClass('star-checked');
    });

    $('.ckbox label').on('click', function () {
    $(this).parents('tr').toggleClass('selected');
    });

    $('.btn-filter').on('click', function () {
    var $target = $(this).data('target');
    if ($target != 'all') {
    $('.table tr').css('display', 'none');
    $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
    } else {
    $('.table tr').css('display', 'none').fadeIn('slow');
    }
    });

        $('.l').click(function(e){
            e.preventDefault();
           var pic=$(this).attr("id");
            $('#myModal').show();
            var src=$('#ml').attr("src");
            var a = src.split("/");

            a.pop();
            a.push(pic);
            var va = a.join();
            var va = va.replace(/,/g, "/");
            $("#ml").attr("src",va);

        });
        $('.rm').click(function(e){
            e.preventDefault();
            //$('#myModal').show();
            $('#sr').html("");
            var review_to=$(this).attr("id");
            $.ajax({
                type:'get',
                url:'review',
                data:{id:review_to},
                success:function(data){


                 if(data!="") {

                      //$('.modal-body').html(rv[1].id);
                      var st="http://shareride.dev/profile/";

                      var tr;
                      for (var i=0; i <data.length; i++) {
                          tr = "<tr>";
                          tr += "<td>" + data[i][0] +  "<img src="+"'"+st+data[i][1]+"'"+" width='40px' class='img-responsive'></td>";
                          tr += "<td>" + data[i][2] + "</td>";
                          tr += "<td>" + data[i][3] + "</td>";
                          tr += "</tr>";

                          $('#sr').append(tr);
                      }

                  }
                  else
                  {
                      $('#sr').html("");
                  }

                }

            });

        });



    });
    $.ajaxSetup(
            {
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });

    </script>
    @endsection
