<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="{{asset('css/auth/sign-up.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign Up</title>
    <link rel="icon" href='{{ url("storage/uploads/image-home/logo.jpeg")}}'>

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
    <div class="container-signup">
        <div class="photo-sign">
            <!-- <img class=" rounded-circle shadow-1-strong me-3" src='{{asset("image-home/undraw (2).svg")}}' alt="avatar" /> -->
        </div>

        <div class="sign-up-form">
            <div class="container">
                <h1>Create Account As</h1>
                <div class="signUpAs">
                    <div class="active customer">Customer</div>
                    <div class="contractor">Constractor</div>
                </div>

                <form class="customer_form" method="POST" action="{{ route('register_user') }}">
                    @csrf
                    <input type="radio" name="kind" value="customer" checked style="opacity:0">

                    <div class="contain">
                        <label for="">Full Name</label>
                        <input id="name" class="input-box form-control " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name"/>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Email</label>
                        <input id="email" class="input-box form-control" type="email" name="email" :value="old('email')" required placeholder="your e-mail" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Password</label>
                        <input id="password" class="input-box form-control" type="password" name="password" required autocomplete="new-password" placeholder="your password"/>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Confirm Password</label>
                        <input id="password_confirmation" class="input-box form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password" />
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Address</label>
                        <input id="address" class="input-box form-control" type="text" name="address"  required autofocus autocomplete="address" placeholder=" your address" />
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">National ID</label>
                        <input id="national_id" class="input-box form-control" type="text" name="national_id"  required autofocus  placeholder="National ID" />
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Phone</label>
                        <input id="phone" class="input-box form-control" type="text" name="phone"  required autofocus  placeholder="your Number" />
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="submit_btn">
                        <input type="submit" class=" btn btn-success" value="Sign Up">
                    </div>

                </form>

                <form class="contractor_form" method="POST" action="{{ route('register_user') }}">
                    @csrf
                    <input type="radio" name="kind" value="contractor" checked style="opacity:0">

                    <div class="contain">
                        <label for="">Full Name</label>
                        <input id="name" class="input-box form-control " type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name"/>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Email</label>
                        <input id="email" class="input-box form-control" type="email" name="email" :value="old('email')" required placeholder="your e-mail" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Password</label>
                        <input id="password" class="input-box form-control" type="password" name="password" required autocomplete="new-password" placeholder="your password"/>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 contain">
                        <label for="">Confirm Password</label>
                        <input id="password_confirmation" class="input-box form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="confirm password" />
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4 contain">
                        <label for="">Address</label>
                        <input id="address" class="input-box form-control" type="text" name="address"  required autofocus autocomplete="address" placeholder=" your address" />
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4 contain">
                        <label for="">Tax Record</label>
                        <input id="tax_record" class="input-box form-control" type="text" name="tax_record"  required autofocus  placeholder=" Your Tax Record" />
                    </div>
                    <div class="mt-4 contain">
                        <label for="">Phone</label>
                        <input id="phone" class="input-box form-control" type="text" name="phone"  required autofocus  placeholder="your Number" />
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="submit_btn">
                        <input type="submit" class=" btn btn-success" value="Sign Up">
                    </div>
                </form>

                <p style="color:black">
                    Have An Account ? &emsp;
                    <a href="{{route('login')}}"><span class="Sign-in">Log In</span> </a>
                </p>
            </div>
        </div>
    </div>


    <script src="{{asset('js/sign-up.js')}}"></script>
  </body>

</html>
