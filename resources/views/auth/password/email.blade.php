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
      <div class="container d-flex justify-content-center align-items-center vh-100">
         <div class="bg-white text-center p-5 mt-3 center">
            <h3>Forgot Password </h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            <form class="pb-3" action="#">
               <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Username*" required>
               </div>
            </form>
            <button type="button" class="btn">Reset Password</button>
         </div>
      </div>
   </body>
</html>