<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="{{ url('image-home/logo.jpeg') }}">

    <link rel="stylesheet" href="{{asset('css/auth/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth/normalise.css')}}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">


</head>
<style>
    .logo img{
        width: 100px;
        height: 100px;
        border-radius: 10px;
        position: absolute;
        top: 15px;
        left: 11px;
    }
</style>
<body>
    <div class="logo">
        <img src='{{url("storage/uploads/image-home/logo.jpeg")}}'/>
    </div>
    <div class="login">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h3><span style="color:#22477e">Login</span> <span style="color:#105868">Here</span></h3>

            <label for="username">Username</label>
            <input type="text" name="email" placeholder="Email or Phone" id="username">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password">

            <input class="submit" type="submit"value="log in">
            <div class="social">
            <div class="go">
                <div class="sign">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <a href="{{route('sign_up')}}">Sign Up</a>
                </div>
            </div>
            <div class="go">
                <i class="fa fa-key" aria-hidden="true"></i>
                <a href="{{ route('password.request') }}">Forget Password ?</a>
            </div>
        </div>
        </form>


    </div>
    <script src="{{asset('js/auth/pro.js')}}"></script>
</body>

</html>
