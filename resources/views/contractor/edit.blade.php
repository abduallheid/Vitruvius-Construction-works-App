@extends('contractor.layout.app')

@section('profile')
  @if($contractor->profile_picture !== NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/Profile_Picture/$contractor->profile_picture") }}' alt="avatar" width="40" height="40" />
  @endif
  @if($contractor->profile_picture == NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" width="40" height="40" />
  @endif
@endsection

@section('title')
    Edit
@endsection

@section('link')
<link rel="stylesheet" href="{{asset('css/home/edit.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

@endsection

@section('content')

<div class="form-container">
  <form class="form-1" action="{{route('contractor.profile_picture')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
      <div class="parent">
        <div class="img-person">
          @if($contractor->profile_picture !== null)
          <img class="profile_picture" src='{{ url("storage/uploads/Profile_Picture/$contractor->profile_picture") }}' alt="" />
          @endif
          @if($contractor->profile_picture == null)
          <img src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="" />
          @endif
          <div class="caption">
            <input type="file" class="form-control btn-success"  name="photo" aria-label="Select Profile Picture" >
            <input type="submit" class="form-control save_profile" value="Save" >
          </div>
        </div>
      </div>
    </div>
  </form>

  <form class="form-2" action="{{route('contractor.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    @isset($contractor)
      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-6 form-control" name="name" value = "{{$contractor->name}}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <br>

      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Email</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-6 form-control" name="email" value = "{{$contractor->email}}" readOnly>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <br>


      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Phone</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-9 form-control" name="phone" value = "{{$contractor->phone}}">
        @error('phone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <br>

      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Address</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-globe" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-9 form-control" name="address" value = "{{$contractor->address}}">
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <br>

      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Tax Record</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-9 form-control" name="tax_record" value = "{{$contractor->tax_record}}" require>
      </div>
    @error('tax_record')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <br>

      <div class="form-actions">
        <button type="button" class="btn btn-warning mr-1"
                onclick="history.back();">
            <i class="ft-x"></i> Back
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="la la-check-square-o"></i> Update
        </button>
    </div>
    @endisset
  </form>

  <form class="form-2 form-3" action="{{route('contractor.update_password')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif

    @isset($contractor)

      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Old Password</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-9 form-control" name="old_password" type="" autocomplete="new-password" placeholder="Type Old Password" >
      </div>
    @error('old_password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <br>

      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Current Password</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-9 form-control" name="current_password" type="" autocomplete="new-password" placeholder="Type New Password" >
      </div>
    @error('current_password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <br>

      <div class="input-group mb-3">
        <div class="col-sm-3">
          <h6 class="mb-0">Current Password</h6>
        </div>
        <div class="input-group-prepend ">
          <span class="input-group-text info_icons" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
        </div>
        <input class="col-sm-9 form-control" name="Confirm_current_password" type="" autocomplete="new-password" placeholder="Confirm New Password" >
      </div>
    @error('Confirm_current_password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      <br>


      <div class="form-actions">
        <button type="button" class="btn btn-warning mr-1"
                onclick="history.back();">
            <i class="ft-x"></i> Back
        </button>
        <button type="submit" class="btn btn-primary">
            <i class="la la-check-square-o"></i> Update
        </button>
    </div>
    @endisset
  </form>
</div>
@endsection

@section('script')
<script>
    let btn1 = document.getElementById("btn1");
    window.onscroll = function () {
        if (scrollY >= 200) {
            btn1.style.display = "flex";
        } else {
            btn1.style.display = "none";

        }
    }
    btn1.addEventListener("click", function () {
        scroll({
            top: 0,
            left: 0,
            behavior: "smooth"
        })
    });
</script>
@endsection
