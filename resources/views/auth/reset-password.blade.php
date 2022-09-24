<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="author" content="Kodinger">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Reset Password</title>
		<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/forgetPass.css') }}">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/auth/forgetPass.css') }}">

	</head>
	<body class="my-login-page">
			
		<div class="container d-flex justify-content-center align-items-center vh-100 ">
			<div class="bg-white text-center p-5 mt-3 center reset">
				<h3>Reset Password </h3>
				<form class="pb-3" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form-group">
                        <input  class="form-control" placeholder="Your Email" type="email" name="email" :value="old('email', $request->email)" required autofocus>
                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    </div>

                    <div class="form-group">
                        <input  class="form-control" placeholder="Your Password" type="password" name="password" required autocomplete="new-password">
                        <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    </div>

                    <div class="form-group">
                        <input  class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" required autocomplete="new-password">
                        <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
                    </div>
                    <input type="submit" class="btn" value="Reset Password">
				</form>

			</div>
		</div>

	</body>
</html>