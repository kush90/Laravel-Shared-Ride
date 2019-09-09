<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Offer;
use App\Review;
use App\BookRide;
use DB;


class AdminController extends Controller
{
    public  function index()
    {

        $riders_role=DB::table('user_has_roles')->where('role_id',1)->first();



            $rider_users=User::where('id',$riders_role->user_id)->get();


        $drivers_role=DB::table('user_has_roles')->where('role_id',2)->first();



        $driver_users= User::where('id', $drivers_role->user_id)->get();







        $offers=Offer::all();
        $reviews=Review::all();
        $review_users=array();

        foreach($offers as $offer)
        {
            $rv_count=array();

                foreach($reviews as $review)
                {
                    if($offer->user_id==$review->review_to)
                    {
                        $rv_count[]=[$review->review_to];
                    }
                }
                $review_users[]=[$offer->user_id,count($rv_count)];






        }
        //dd($driver_users);


       //echo $driver_users[0][0]["profile"];

       return view('admin.index',compact('rider_users','driver_users','review_users'));
    }
    public  function review(Request $request){

        $id= $request->get("id");
        $rv_users=array();
        $reviews=Review::where('review_to',$id)->get();
        foreach ($reviews as $review)
        {
            $users=User::where('id',$review->user_id)->get();
            foreach($users as $user)
            {
                if($user->id==$review->user_id)
                {
                    $rv_users[]=[$user->name,$user->profile,$review->review,$review->created_at];
                }
            }
        }
        return $rv_users;


    }
    public  function view_offered()
    {
        $offers=Offer::all();
        $users=User::all();
        $bookrides=BookRide::all();
        return view('admin.view_offered',compact('offers','users','bookrides'));
    }
    public  function delete(Request $request,$id)
    {

       User::where('id',$id)->delete();
        Review::where('review_to',$id)->delete();
       return redirect()->back()->with('success','You have deleted Successfully');


    }
}
