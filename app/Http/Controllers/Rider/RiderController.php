<?php

namespace App\Http\Controllers\Rider;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use App\Review;
use App\Offer;
use App\BookRide;
use Illuminate\Support\Facades\Hash;
use Nexmo;

class RiderController extends Controller
{
    public  function index()
    {
        $im=Auth::user();
        $offers=Offer::all();
        $users=User::all();
        $offer_users=array();
        $reviews=Review::all();


        foreach($offers as $offer)
        {
            foreach($users as $user)
            {



                    if ($offer->user_id == $user->id ) {
                        $offer_users[] = [$offer->id, $user->name, $user->profile, $offer->from, $offer->to, $offer->date, $offer->time, $offer->gender,
                            $offer->seat,$user->id];
                    }
                }
        }

        $review_user=array();

        foreach($offers as $offer)
        {
            $review_count=array();
            $rvs=Review::where('review_to',$offer->user_id)->get();
            foreach($rvs as $rv)
            {
                if($offer->user_id==$rv->review_to)
                {
                    array_push($review_count,$rv->review_to);
                }

            }
            array_push($review_user,[$offer->user_id,count($review_count)]);
        }


        return view('rider.index',compact('im','offer_users','review_user'));
    }

    public function profile()
    {
        $im=Auth::user();
        return view('rider.profile',compact('im'));
    }

    public function update_profile(Request $request)
    {
        $im=Auth::user();
        $id=Auth::user()->id;
        $this->validate($request,[
            'name' => 'required',
            'phone'=>'required',

        ]);
        $newp;
        $name=$request->get('name');
        $phone=$request->get('phone');
        $filep=$request->file('profile');
        $profile=$request->get('profile1');
        if(empty($filep))
        {
            $newp=$profile;
        }
        else
        {
            $newp=$filep->getClientOriginalName();
            $filep->move(public_path().'/profile',$newp);
        }

        DB::table('users')->where('id',$id)->update([

            'name'=>$name,
            'phone'=>$phone,
            'profile'=>$newp,
            'updated_at'=> date('Y-m-d H:m:s'),

        ]);

        return redirect()->to('rider/profile')->with('success','Successfully updated your profile');

    }

    public function password()
    {
        $im=Auth::user();
        return view('rider.change',compact('im'));
    }

    public function change(Request $request)
    {
        $this->validate($request,[
            'current_password' => 'required|min:6|max:10',
            'new_password'=>'required|min:6|max:10',

        ]);

        $userid=Auth::user()->id;

        $user=User::where("id",$userid)->first();

        if(Hash::check($request->get('current_password'),$user->password))
        {
            $new=bcrypt($request->get('new_password'));
            $user->password=$new;
            $user->save();
            return redirect()->to('rider/change/password')->with('change','Your password has been changed successfully');

        }
        else
        {
            return redirect()->to('rider/change/password')->with('success','Your Current password doesn\'t match');
        }
    }

    public  function driver_profile($name)
    {

        $im=Auth::user();
        $users=User::all();
        $user=User::where("name",$name)->firstOrFail();
        $reviews=Review::where('review_to',$user->id)->orderBy('created_at', 'desc')->get();

        return view('rider.driver_profile',compact('im','user','reviews','users'));
    }

    public function give_review($to,Request $request)
    {
        $driver= $to;
        $review_to=User::where('name',$driver)->firstOrFail();
        $review=$request->get('review');
        $user_id=$request->get('rider_id');
        Review::Create([
            'user_id'=>$user_id,
            'review'=>$review,
            'review_to'=>$review_to->id,
        ]);

        return redirect()->back();

    }
    public  function join(Request $request)
    {
        $offer_id=$request->get("id");
        $offer=Offer::where("id",$offer_id)->firstOrFail();
        $user=User::where("id",$offer->user_id)->firstOrFail();
        $se=$offer->seat;
        $se=$se-1;
        $offer->seat=$se;
        $offer->save();
        $user_id=Auth::user()->id;

        BookRide::create([
            'offer_id'=>$offer_id,
            'user_id'=>$user_id
        ]);

         $ph=$user->phone;
         $n=substr($ph,3);
         $msg='driver name is '.$user->name."<br>"."phone number is ".$n;



       /* Nexmo::message()->send([
            'to' => $user->phone,
            'from' => 'ShareRide',
            'text' => 'Customer is '.Auth::user()->name."phone number is".Auth::user()->phone
        ]);*/
       echo $se."-".$offer_id;

         /*Nexmo::message()->send([
              'to' => Auth::user()->phone,
              'from' => 'ShareRide',
              'text' => $msg
          ]);*/

    }
    public function history()
    {
        $im=Auth::user();
        $booked_ride=array();
        $users=User::all();
        $books=BookRide::distinct()->select('offer_id')->where('user_id',$im->id)->get();
        //dd($books);

       foreach($books as $book)
        {
            $offers=Offer::where('id',$book->offer_id)->get();
            foreach($offers as $offer)
            {
                $booked_ride[]=[$offer->id,$offer->user_id,$offer->from,$offer->to,$offer->date,$offer->time];
            }
        }
        //dd($booked_ride);
        return view('rider.history',compact('im','booked_ride','users'));
    }
}
