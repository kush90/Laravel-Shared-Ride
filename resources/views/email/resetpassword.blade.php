<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
</head>
<body>
<div class="well">
    <h2>Password Reset</h2>
    <p>
        Hello  {{$name}}
    </p>
    <p>You are receiving this email because we received a password reset request for your account</p>
    <a href="{{url('reset/password/'.$email.'/'.$token)}}"><button class="btn btn-primary">Reset Password</button> </a>
</div>
</body>
</html>





