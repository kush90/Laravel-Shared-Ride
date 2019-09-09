<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use DB;
use Mail;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function reset(Request $request)
    {
        $email=$request->get('email');
        $user=User::where("email",$email)->first();


        if(count($user)==0)
        {


            return redirect()->back()->with('status','We can\'t find a user with that e-mail address.');
        }
        else {
            $user=$user->toArray();
            $user['token']=str_random(30);

            DB::table('password_resets')->insert(['email'=>$user['email'],'token'=>$user['token'],'created_at'=>date('Y-m-d H:m:s')]);
            try
            {
                Mail::send('email.resetpassword',$user,function($message) use ($user){
                    $message->to($user['email']);
                    $message->subject('Reset Password');
                });
            }
            catch (\Exception $e)
            {
                DB::table('password_resets')->where('email',$user["email"])->delete();
                return redirect()->back()->with('success1','Fail to reset password link.Try Again');

            }


            return redirect()->back()->with('success','We send the link to reset your password');
        }

    }
    public  function showResetForm($email,$token)
    {
        $user=User::where('email',$email)->firstOrFail();


        if(count($user)>0)
        {
            $user_token=DB::table('password_resets')->where('token',$token)->first();
            if(count($user_token)>0)
            {
                return view('email.reset_form')->with(
                    ['token' => $token, 'email' => $email]);
            }
            else
            {
                return redirect('forget/password')->with('token','Sorry You didn\'t request for password reset');
            }

        }
    }
    public  function resetPassword(Request $request,$email,$token)
    {
        $this->validate($request,[
            'password' => 'required|string|confirmed|max:10',
            'password_confirmation' => 'required|max:10',
        ]);

        $user=User::where('email',$email)->firstOrFail();


        if(count($user)>0)
        {
            $user_token=DB::table('password_resets')->where('token',$token)->first();
            if(count($user_token)>0)
            {
                $user->password=bcrypt($request->get('password'));
                $user->save();
                DB::table('password_resets')->where('email',$user->email)->delete();
                return redirect('user/login')->with('success','You can login with your new password');
            }
            else
            {
                return redirect('forget/password')->with('token','Sorry You didn\'t request for password reset');
            }

        }
    }
}
