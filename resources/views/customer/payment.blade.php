@extends('customer.layout.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/payment.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

@endsection

@section('title')
    Payment
@endsection

@section('profile')
  @if($customer->profile_picture !== NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/Profile_Picture/$customer->profile_picture") }}' alt="avatar" width="40" height="40" />
  @endif
  @if($customer->profile_picture == NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" width="40" height="40" />
  @endif
@endsection

@section('content')
@isset($project_id)
<div class="login">
    <form method="POST" action="{{ route('user.pay') }}">
        @csrf
        <h3><span style="color:#22477e">Payment</span> <span style="color:#105868">Here</span></h3>
        @if($project->payment_status == 1)
            <div class="alert alert-success">
                Payment Successfully Done!
            </div>
        @endif
        @isset($error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endisset


        <input type="hidden" name="user_id" value="{{$customer->id}}">
        <input type="hidden" name="project_id" value="{{$project_id}}">
        <label for="username">Email</label>
        <input type="text" name="email" placeholder="Email or Phone" id="username" value="{{$customer->email}}">

        <label for="name">UserName</label>
        <input type="name" name="name" placeholder="UserName" id="name" value="{{$customer->name}}">

        <label for="salary">Salary</label>
        <input type="salary" name="salary" placeholder="salary" id="salary"  value="{{intval($props[0]->PREDICTION) + 50}}" readOnly>

        <input type="submit"value="Pay">

    </form>
</div>
@endisset


@endsection
@section('script')
    <script src="{{asset('js/auth/pro.js')}}"></script>
@endsection
