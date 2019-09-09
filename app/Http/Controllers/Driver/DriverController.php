<?php

namespace App\Http\Controllers\Driver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;
use DB;
use App\Offer;


class DriverController extends Controller
{
    public  function index()
    {

        $uid=Auth::user()->id;
        $user=User::where('id',$uid)->first();
        $offers=Offer::where('user_id',$uid)->get();
        return view('driver.index',compact('user','offers'));
    }
    public  function update_profile(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
             'phone'=>'required',
              'car_number'=>'required',
               'type_of_car'=>'required',
        ]);

        $newp;
        $newl;

        $name=$request->get('name');
        $phone=$request->get('phone');
        $gender=$request->get('gender');
        $car_number=$request->get('car_number');
        $type_of_car=$request->get('type_of_car');
        $color=$request->get('color');
        $filep=$request->file('profile');
        $profile=$request->get('profile1');
        $filel=$request->file('lience');
        $lience=$request->get('lience1');

       if(empty($filep))
       {
           $newp=$profile;
       }
       else
       {
           $newp=$filep->getClientOriginalName();
           $filep->move(public_path().'/profile',$newp);
       }
        if(empty($filel))
        {
            $newl=$lience;
        }
        else
        {
            $newl=$filel->getClientOriginalName();
            $filel->move(public_path().'/lience',$newl);
        }

        DB::table('users')->where('id',Auth::user()->id)->update([


            'name'=>$name,
            'gender'=>$gender,
            'phone'=>$phone,
            'profile'=>$newp,
            'lience'=>$newl,
            'carnumber'=>$car_number,
            'typeofcar'=>$type_of_car,
            'color'=>$color,
            'updated_at'=> date('Y-m-d H:m:s'),

        ]);

    }
    public function change_password(Request $request)
    {
        $this->validate($request,[
            'current_password' => 'required|min:6|max:10',
            'new_password'=>'required|min:6|max:10',

        ]);
        $userid=Auth::user()->id;

        $user=User::where("id",$userid)->first();

        if(Hash::check($request->get('old_password'),$user->password))
        {
            $new=bcrypt($request->get('new_password'));
            $user->password=$new;
            $user->save();
             return 1;
        }
        else
        {
            return 0;
        }

    }
    public  function offer_ride(Request $request)
    {
        $this->validate($request,[
            'from' => 'required',
            'to'=>'required',
            'date'=>'required',
            'time'=>'required',
            'seat'=>'required',

        ]);
        Offer::create([
            'user_id'=>Auth::user()->id,
            'from'=>$request->get('from'),
            'to'=>$request->get('to'),
            'date'=>$request->get('date'),
            'time'=>$request->get('time'),
            'seat'=>$request->get('seat'),
            'gender'=>$request->get('gender'),
        ]);
    }
}
