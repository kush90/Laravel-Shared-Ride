<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Nexmo;


class PageController extends Controller
{
    public  function index()
    {

        return view('home');
    }
    public  function  driver_register()
    {
        return view('driver_register');
    }
    public  function rider_register()
    {
        return view('rider_register');
    }


}
