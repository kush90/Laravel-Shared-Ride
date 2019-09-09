<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--link rel="stylesheet" href="{{asset('css/driver.css')}}"-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .navbar-default{
            background-color: #f4511e;
        }
        .image-circle{
            border-radius: 40%;
            width: 45px;
            height: 45px;
            border: 4px solid #FFF;
            margin: 0px;
        }
        .outter{
            padding: 0px;
            border: 1px solid rgba(255, 255, 255, 0.29);
            border-radius: 40%;
            width: 45px;
            height: 45px;
            display: inline-block;
        }
        @media (max-width: 767px) {

            .navbar-default .navbar-nav .open .dropdown-menu > li > a {
                color: white;
            }
        }
        .navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
            color: #555;
            background-color:  #f4511e;
        }
        .navbar-default .navbar-brand {
            color: white;
        }
        .navbar-default .navbar-nav>li>a {
            color:white;
        }

        .main-list {
            padding-left: .5em;
        }

        .main-list .media {
            padding-bottom: 1.1em;
            border-bottom: 1px solid #e8e8e8;
        }

        @media only screen and  (max-width: 373px)  {
            .media-body{

                display: block;
                position: relative;
                top:20px;

            }
            #j{
                position: relative;
                left:-150px;
            }



        }
    </style>
</head>