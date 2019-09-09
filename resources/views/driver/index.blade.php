@extends('driver.layout.master')
@section('title','Driver Dashboard')

@section('content')

   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 bhoechie-tab-container">
                <div class="col-md-4 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            <h4 class="glyphicon glyphicon-user"></h4><br/>Profile
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="fa fa-car" aria-hidden="true"></h4><br/>Offer A  Ride
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="glyphicon glyphicon-th-list"></h4><br/>List Of Your Offered
                        </a>


                    </div>
                </div>
                <div class=" col-md-8 bhoechie-tab">
                    <!-- flight section -->
                    <div class="bhoechie-tab-content active">
                        <center>
                            <h1 class="text-center" style="color:#55518a">Profile</h1>
                            <div class="well">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
                                    <li><a href="#change" data-toggle="tab">Password</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane active in" id="home">
                                      <br>
                                        <div id="ss" style="display: none;"></div>
                                            <form  id="tab"class="form-horizontal frm1" method="post" name="update"  enctype="multipart/form-data" >
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Email ID </label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                            <input type="email" class="form-control" name="email" id="emailid" placeholder="Enter your Email ID" value="{{$user->email}}">

                                                        </div>


                                                        </div>
                                                </div>



                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Full Name</label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-users" aria-hidden="true"></i></span>
                                                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter your full name" value="{{$user->name}}" style="height: 30px;"/>

                                                        </div>


                                                    </div>


                                                </div>
                                                <div class="form-group">
                                                    <label for="gender" class="control-label col-sm-3">Allowed Gender:</label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group">
                                                            @if($user->gender=="Male")
                                                        <input name="gender"  name="gender" type="radio" value="Male" checked>Male
                                                                <input name="gender"  name="gender" type="radio" value="Female"  >Female

                                                           @elseif($user->gender=="Female")
                                                                <input name="gender"  name="gender"  type="radio" value="Male">Male

                                                        <input name="gender"  name="gender" type="radio" value="Female" checked >
                                                        Female
                                                            @endif
                                                    </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Contact No.</label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                                            <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your Primary contact no." value="{{$user->phone}}">
                                                        </div>


                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Profile Photo
                                                    </label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group" id="f"> <span class="input-group-addon" id="file_upload"><i class="fa fa-picture-o" aria-hidden="true"></i></span>

                                                            <input type="file" style="padding:3px;" name="profile"   id="profile" class="form-control upload " placeholder="" aria-describedby="file_upload">
                                                        </div>
                                                        <br>
                                                        <img src="{{asset('profile/'.$user->profile)}}"  id="p" width="100px" alt="" class="img-responsive">
                                                        <input type="hidden" name="profile1" value="{{$user->profile}}">
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Driver Lience Photo
                                                    </label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group" id="f"> <span class="input-group-addon" id="file_upload"><i class="fa fa-picture-o" aria-hidden="true"></i></span>

                                                            <input type="file" style="padding:3px;" name="lience"  id="lience" class="form-control upload " placeholder="" aria-describedby="file_upload">

                                                        </div>
                                                        <br>
                                                        <img src="{{asset('lience/'.$user->lience)}}" id="l" width="100px" alt="" class="img-responsive">
                                                        <input type="hidden" name="lience1" value="{{$user->lience}}">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Car Number</label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" name="car_number" id="car_number" placeholder="Enter your car number" value="{{$user->carnumber}}">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Type of Car</label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" name="type_of_car" id="type_of_car" placeholder="Enter your type of car" value="{{$user->typeofcar}}">
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-3">Color of Car</label>
                                                    <div class="col-md-5 col-sm-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
                                                            <input type="color" id="color" class="form-control" name="color" value="{{$user->color}}" />

                                                        </div>

                                                    </div>
                                                </div>




                                                   <button class="btn btn-primary" id="update">Update Your Profile</button>
                                                   <div class="clearfix"></div>



                                            </form>

                                    </div>
                                    <div class="tab-pane fade" id="change">
                                        <form id="tab2" class="form-horizontal frm2">
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
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-3">New Password</label>
                                                <div class="col-md-5 col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                        <input type="password" class="form-control" name="new_password" minlength="6" maxlength="10" id="new_password" placeholder="Enter your new password" value="">
                                                    </div>

                                                </div>
                                            </div>
                                            <input name="submit" type="submit" value="Change Your  Password" class="btn btn-primary pull-left">
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </center>
                    </div>
                    <!-- train section -->
                    <div class="bhoechie-tab-content">
                        <center>
                            <h1 class="" style="color:#55518a">Add post</h1>
                            <div class="well">
                                <form class="frm3">
                                {{csrf_field()}}
                                    <div id="ss3" style="display: none;"></div>
                                <div class="form-group">

                                    <label for="from" class="col-2 col-form-label">From:</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text"  name="from" id="from" placeholder="Enter location">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="to" class="col-2 col-form-label">To:</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text"  name="to" id="to" placeholder="Enter your destination location">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date" class="col-2 col-form-label">Date:</label>
                                    <div class="col-10">
                                        <input class="form-control" type="date"  name="date" id="date">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="time" class="col-2 col-form-label">Time:</label>
                                    <div class="col-10">
                                        <input class="form-control" type="time" value="12:13:00" name="time" id="time">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="seat" class="col-2 col-form-label">Available Seat:</label>
                                    <div class="col-10">
                                        <input class="form-control" type="text" placeholder="Enter allowed number of seats" name="seat" id="seat">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="gender" class="col-2 col-form-label">Allowed Gender:</label>
                                    <div class="col-10">

                                        <input name="gender"  name="gender" type="radio" value="Male">
                                        Male
                                           

                                        <input name="gender"  name="gender" type="radio" value="Female" >
                                        Female
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-10">
                                        <input name="submit" type="submit" value="Offer Ride" class="btn btn-primary ">
                                    </div>
                                </div>
                        </form>
                            </div>
                        </center>
                    </div>

                    <!-- hotel search -->
                    <div class="bhoechie-tab-content">
                        <center>
                            <h1 style="color:#55518a">List of your offered</h1>
                            @if(!empty($offers))
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">From</th>
                                    <th class="text-center">To</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Seat</th>
                                    <th class="text-center">Gender</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                <tr>
                                    <th scope="row" class="text-center">{{$offer->id}}</th>
                                    <td class="text-center">{{$offer->from}}</td>
                                    <td class="text-center">{{$offer->to}}</td>
                                    <td class="text-center">{{$offer->date}}</td>
                                    <td class="text-center">{{$offer->time}}</td>
                                    <td class="text-center">{{$offer->seat}}</td>
                                    <td class="text-center">@if($offer->gender==null)
                                            -
                                            @else
                                            {{$offer->gender}}
                                            @endif

                                    </td>
                                </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            </div>
                                @else
                                <p>There is no your offered rides yet.</p>
                            @endif

                        </center>
                    </div>


                </div>
            </div>
        </div>
    </div>

   </div>

   <script>
       $(document).ready(function() {
           $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
               e.preventDefault();
               $(this).siblings('a.active').removeClass("active");
               $(this).addClass("active");
               var index = $(this).index();
               $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
               $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
           });
       });
       $(".frm1").on("submit",function(e){

           e.preventDefault();






           $.ajax({

               url:"update/profile",
               type:"post",
               data:new FormData(this),
               contentType:false,
               cache:false,
               processData:false,
               success:function(data){


                   var name;
                   var pp = $('#profile')[0].files[0];
                   if(pp) {
                       name = pp.name;
                       var src = $('#p').attr('src');
                       var a = src.split("/");

                       a.pop();
                       a.push(name);
                       var va = a.join();
                       var va = va.replace(/,/g, "/");
                       $('#p').attr("src", va);
                   }

                   var name1;
                   var ll = $('#lience')[0].files[0];
                   if(ll) {
                       name1 = ll.name;
                       var src = $('#l').attr('src');
                       var a = src.split("/");

                       a.pop();
                       a.push(name1);
                       var va = a.join();
                       var va = va.replace(/,/g, "/");
                       $('#l').attr("src", va);
                   }


                      document.getElementById('ss').innerHTML = "<p class='alert alert-success'>" + "You have updated your profile information successfully" + "<p>";
                       $('#ss').show();





               }
               ,
               error:function(data) {
                   var errors = "";
                   for(a in data.responseJSON){
                       errors +='*' +data.responseJSON[a] + '<br>';

                   }
                  var e="<p class='alert alert-danger'>"+errors+'</p>';

                   $('#ss').show().html(e);
               }
           });

       });
       $('.frm2').on('submit',function(e){
           e.preventDefault();
           $.ajax({

               url:'change/password',
               type:'post',
               contentType:false,
               processData:false,
               data:new FormData(this),
               success:function(data)
               {

                  if(data ==1) {
                       document.getElementById('ss2').innerHTML = "<p class='alert alert-success'>" + "You have changed your new password  successfully" + "<p>";
                      $('#ss2').show();
                  }
                   else if(data==0)
                   {
                       document.getElementById('ss2').innerHTML = "<p class='alert alert-danger'>" + "Your Current password doesn't match" + "<p>";
                       $('#ss2').show();
                  }
               },
               error:function (data) {

                   var errors = "";
                   for(a in data.responseJSON){
                       errors +='*' +data.responseJSON[a] + '<br>';

                   }
                   var e="<p class='alert alert-danger'>"+errors+'</p>';

                   $('#ss2').show().html(e);
               }
           });
       });


         $('.frm3').on('submit',function(e){
             e.preventDefault();

             $.ajax({
                 url:'offer/ride',
                 type:'post',
                 data:new FormData(this),
                 cache:false,
                 contentType:false,
                 processData:false,
                 success:function(data){

                     document.getElementById('ss3').innerHTML = "<p class='alert alert-success'>" + "You have offered a ride successfully" + "<p>";
                     $('#ss3').show();


                 },
                 error:function (data) {
                     var errors = "";
                     for(a in data.responseJSON){
                         errors +='*' +data.responseJSON[a] + '<br>';

                     }
                     var e="<p class='alert alert-danger'>"+errors+'</p>';

                     $('#ss3').show().html(e);
                 }
             });
         });


   </script>
    @endsection


