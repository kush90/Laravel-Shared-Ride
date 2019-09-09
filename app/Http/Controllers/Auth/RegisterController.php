<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use DB;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:10|confirmed',



        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);
    }

    public  function driver_store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:10|confirmed',
            'password_confirmation'=>'required',
            'phone'=>'required',
            'profile'=>'required',
            'lience'=>'required',
            'typeofcar'=>'required',
            'carnumber'=>'required',
        ]);

        $profile=$request->file('profile');
        $profilename=$profile->getClientOriginalName();
       $profile->move(public_path().'/profile',$profilename);

        $lience=$request->file('lience');
        $liencename=$lience->getClientOriginalName();
        $lience->move(public_path().'/lience',$liencename);





            $user_id=DB::table('users')->insertGetId([
                'name' => $request->get('name'),
                'email' =>$request->get('email'),
                'password' => bcrypt($request->get('password')),
                'gender'=>$request->get('gender'),
                'phone'=>$request->get('phone'),
                'profile'=>$profilename,
                'lience'=>$liencename,
                'carnumber'=>$request->get('carnumber'),
                'typeofcar'=>$request->get('typeofcar'),
                'color'=>$request->get('color'),
                'created_at'=>date('Y-m-d H:m:s'),
                'updated_at'=>date('Y-m-d H:m:s'),
            ]);
            $token=str_random(30);
            $user=User::where('id',$user_id)->first();
            $u=$user->toArray();
            $u['token']=$token;



        DB::table('user_activations')->insert(['user_id'=>$u["id"],'token'=>$u["token"]]);
        DB::table('user_has_roles')->insert(['role_id'=>2,'user_id'=>$u["id"]]);
        try {
            Mail::send('email.activation', $u, function ($message) use ($u) {
                $message->to($u['email']);
                $message->subject('Account Verification ');
            });
        }
        catch (\Exception $e)
        {

            DB::table('users')->where("id",$user_id)->delete();
            DB::table('user_activations')->where("user_id",$user_id)->delete();
            DB::table('user_has_roles')->where('user_id',$user_id)->delete();

            $errors = 'Failed to Register, please try again.';
            return redirect()->to('rider/register')->with('success',$errors);
        }




           return redirect()->to('user/login')->with('success','We sent Activation code to your Mail,Please check your Mail');

    }
    public function rider_store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:10|confirmed',
            'password_confirmation'=>'required',
            'phone'=>'required',
            'profile'=>'required',

        ]);

        $profile=$request->file('profile');
        $profilename=$profile->getClientOriginalName();
        $profile->move(public_path().'/profile',$profilename);




            $user_id = DB::table('users')->insertGetId([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password')),
                'gender' => $request->get('gender'),
                'phone' => $request->get('phone'),
                'profile' => $profilename,

                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ]);
            $token = str_random(30);
            $user = User::where('id', $user_id)->first();
            $u = $user->toArray();
            $u['token'] = $token;


            DB::table('user_activations')->insert(['user_id' => $u["id"], 'token' => $u["token"]]);
            DB::table('user_has_roles')->insert(['role_id' => 1, 'user_id' => $u["id"]]);
        try {
            Mail::send('email.activation', $u, function ($message) use ($u) {
                $message->to($u['email']);
                $message->subject('Account Verification ');
            });

        }
        catch(\Exception $e) {


                DB::table('users')->where("id", $user_id)->delete();
                DB::table('user_activations')->where("user_id", $user_id)->delete();
                DB::table('user_has_roles')->where('user_id', $user_id)->delete();

                $errors = 'Failed to Register, please try again.';
                return redirect()->to('rider/register')->with('success', $errors);

        }


        return redirect()->to('user/login')->with('success','We sent Activation code to your Mail,Please check your Mail');





    }
    public  function  activate($token)
    {
        $user_token=DB::table('user_activations')->where('token',$token)->first();

        if(!is_null($user_token))
        {
            $user= User::find($user_token->user_id);


            if($user->is_activated==1)
            {

                return  redirect()->to('user/login')->with('success','Your Account is already  Activated');
            }
            else
            {

                $user->is_activated=1;
                $user->save();
                DB::table('user_activations')->where('token',$token)->delete();
                return redirect()->to('user/login')->with('success','Your Account is  activated Successfully');
            }



        }
        return redirect()->to('users/login')->with('warning','Your Token  is  invalid');

    }
}
