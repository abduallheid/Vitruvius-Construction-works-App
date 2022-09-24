@extends('contractor.layout.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/home/profile.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@endsection

@section('profile')
  @if($contractor->profile_picture !== NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/Profile_Picture/$contractor->profile_picture") }}' alt="avatar" width="40" height="40" />
  @endif
  @if($contractor->profile_picture == NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" width="40" height="40" />
  @endif
@endsection


@section('title')
    Profile
@endsection

@section('notification')
    <ul class="notification_dropdown_2">
        <li class="notify_icon_2">
            @if($notification_count > 0)
            <span class="count_notify_2" data-count="{{$notification_count}}">{{$notification_count}}</span>
            @endif

            <i class="fas fa-bell"></i>
        </li>
        <li>
            <h2>Notifications</h2>
            <div class ="pop_up_notify_2">
                <!-- <a class="read_all">Mark All As Read <i class="fa fa-check" aria-hidden="true"></i></a> -->
                <form class="read_all" action="{{route('contractor.read_all')}}" method="post">
                    @csrf
                    <input class="btn btn-primary" type="submit" value="Mark All Read">
                </form>

                @foreach($notifications as $notification)
                    <div class="pop_up_container_2">
                        @if($notification->profile_picture !== 'profile.jpg')
                        <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/Profile_Picture/$notification->profile_picture") }}' alt="avatar" width="40" height="40" />
                        @endif
                        @if($notification->profile_picture == 'profile.jpg')
                        <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" width="40" height="40" />
                        @endif
                        <a href="{{$notification->address}}">
                            <span class="h3_reply">
                                {{$notification->user_name}} has added new project
                            </span>
                        </a>
                        <span class="time"> {{$notification->created_at->format('d-m-Y h:i')}} </span>
                        @if($notification->seen == 0)
                        <form class="read" action="{{route('contractor.mark_as_read',$notification->id)}}" method="post">
                            @csrf
                            <input class="btn btn-success" type="submit" value="Mark As Read">
                        </form>
                        @endif
                    </div>
                    <!-- <a class="read">Mark As Read</a> -->

                @endforeach
            </div>

        </li>
    </ul>
@endsection

@section('content')
<div class="container">
    <div class="main-body prof">
      @isset($contractor)

          <div class="parent">
              <div class="img-person">
                @if($contractor->profile_picture !== null)
                <img class="profile_picture" src='{{ url("storage/uploads/Profile_Picture/$profile_picture") }}' alt="" />
                @endif
                @if($contractor->profile_picture == null)
                <img src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="" />
                @endif
                <div class="caption">
                <a class="btn btn-danger " href="{{route('contractor.edit')}}">Upload</a>
                </div>
              </div>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="profile_info">

                <div class="row-container">
                  <div class="prop">
                    <h6 class="">Full Name</h6>
                  </div>

                  <div class="value">
                  {{$contractor->name}}
                  </div>
                </div>
                <hr>

                <div class="row-container">
                  <div class="prop">
                    <h6 class="">Email </h6>
                  </div>

                  <div class="value">
                  {{$contractor->email}}
                  </div>
                </div>
                <hr>
                <div class="row-container">
                  <div class="prop">
                    <h6 class="">Address</h6>
                  </div>

                  <div class="value">
                  {{$contractor->address}}
                  </div>
                </div>
                <hr>
                <div class="row-container">
                  <div class="prop">
                    <h6 class="">Tax Record</h6>
                  </div>

                  <div class="value">
                  {{$contractor->tax_record}}
                  </div>
                </div>
                <hr>
                <div class="row-container">
                  <div class="prop">
                    <h6 class="">Phone</h6>
                  </div>

                  <div class="value">
                  {{$contractor->phone}}
                  </div>
                </div>
                <hr>

                <div class=" form-actions">
                    <a class="btn btn-danger " href="{{route('contractor.edit')}}">Edit</a>
                </div>
              @endisset
            </div>


        </div>
    </div>
@endsection
