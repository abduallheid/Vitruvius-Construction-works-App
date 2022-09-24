

<!DOCTYPE html>
<html>
   <head>
      <title>Reset Password Form In Bootstrap</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/auth/forgetPass.css') }}">

   </head>
   <body>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
      <div class="container d-flex justify-content-center align-items-center vh-100">
         <div class="bg-white text-center p-5 mt-3 center">
            <h3>Forgot Password </h3>
            <form class="pb-3" method="POST" action="{{ route('password.email') }}">
            @csrf
               <div class="form-group">
                  <input  class="form-control" placeholder="Your Email" type="email" name="email" :value="old('email')" required autofocus>
               </div>
               <input type="submit" class="btn" value="Reset Password">
            </form>
         </div>
      </div>
   </body>
</html>