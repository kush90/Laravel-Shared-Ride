@extends('rider.layout.master')
@section('title','Driver Dashboard')

@section('content')
    <style>
        a:hover
        {
            text-decoration: none;
        }

    </style>

    <div class="container">
        <div class="row" >

           <div class="col-md-8 col-md-offset-2" >

               <div class="row">
                   <div class="col-md-8 col-md-offset-2" style="box-shadow: 1px 1px 1px gray,-1px -1px 1px gray;">


                               <h3 class="panel-title text-center" style="font-size:20px;padding:20px;">Available offered ride</h3>

                   </div>

               </div><br>

              <div class="row">

                  @foreach($offer_users as $user)



                      <div class="col-md-8 col-md-offset-2" style="box-shadow: 1px 1px 1px gray,-1px -1px 1px gray;margin-bottom:10px;padding-top:15px;">

                          <ul class="media-list main-list" style="">

                              <li class="media">
                                  <a class="pull-left" href="{{action('Rider\RiderController@driver_profile',$user[1])}}">

                                      <img class="media-object" src="{{asset('profile/'.$user[2])}}" style="width: 120px; height: 120px; border: 2px solid white;" width="150px" height="90px" alt="...">

                                      <br>
                                      <span style=" background-color: #EFF8FD; padding: 5px 10px 5px 10px; border-radius: 27px;">{{$user[1]}} </span>&nbsp;

                                      <span style=" background-color: #EFF8FD; padding: 5px 10px 5px 10px;border-radius: 27px;">Review <strong>
                                              @foreach($review_user as $rev)

                                                  @if($rev[0]==$user[9])
                                                  {{$rev[1]}}
                                                  @endif
                                                  @endforeach
                                          </strong></span>

                                  </a>

                                  <div class="media-body">
                                      <blockquote style="font-size:13px;">
                                          <p style="">
                                          From:&nbsp;&nbsp;{{$user[3]}} <br><br>
                                          To:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$user[4]}}<br><br>
                                          Date:&nbsp;&nbsp;&nbsp;{{$user[5]}}<br><br>
                                          Time:&nbsp;&nbsp;{{$user[6]}}<br><br>
                                          Only:{{$user[7]}}<br><br>
                                          Available Seat:<span class="seat" id="{{$user[0]}}">
                                                  @if($user[8]>0)
                                                      {{$user[8]}}
                                                      @else
                                                      None
                                                      @endif

                                              </span></p>
                                      </blockquote>


                                  </div>

                                  @if($user[8]>0)
                                  <a type="button"    id="{{$user[0]}}"  class="btn btn-primary pull-right join">Join</a type="button">
                                       @else
                                      <p class="alert alert-danger">Full for this ride.</p>
                                         @endif


                              </li>

                          </ul>
                      </div>

                  @endforeach




              </div>
           </div>

            </div>


        </div>
    <script>
        $(document).ready(function(){
            $('.join').click(function(){
                var offer_id=$(this).attr("id");

                $.ajax({
                    type:'get',
                    url:"join",
                    data:{id:offer_id},
                    success:function(data){

                        var data_ar=data.split("-");
                        var seat=data_ar[0];
                        var offerid=data_ar[1];


                            $(".seat").each(function(){
                               var id= $(this).attr("id");
                                if(id==offer_id)
                                {

                                    $(this).html(seat);


                                }
                            });
                            $('.join').each(function(){
                               var id= $(this).attr("id");
                                if(id==offerid)
                                {
                                    if(seat==0)
                                    {
                                        $(this).css("display",'none');
                                    }
                                }
                            });
                          alert('You have booked for this ride successfully');
                    }
                });
            });
        });
    </script>

    @endsection


