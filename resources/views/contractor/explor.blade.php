@extends('contractor.layout.app')

@section('profile')
  @if($contractor->profile_picture !== NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/Profile_Picture/$contractor->profile_picture") }}' alt="avatar" width="40" height="40" />
  @endif
  @if($contractor->profile_picture == NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" width="40" height="40" />
  @endif
@endsection

@section('link')
<link rel="stylesheet" href="{{asset('css/your project.css')}}">
<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap"rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap"rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@endsection

@section('title')
    Explor
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

<div class="title">
    <div class="container">
        <div class="info">
            <h3>Your project</h3>
        </div>
        <div class="projects">
        @isset($contractor)
          @foreach($project as $pro)
            <div data-aos="fade-up" data-aos-delay="150" class="card">
                <div class="box">
                    <div class="det">
                    @if($pro->arch === 'Italian')
                        <div class="fram">
                          <iframe title="Petrovsky travel palace in Moscow" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/98620d7a356445e593a1fe71b4e9cf20/embed"> </iframe>
                        </div>
                        @endif
                        @if($pro->arch === 'American')
                        <div class="fram">
                          <iframe src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
                        </div>
                        @endif
                        @if($pro->arch === 'UK')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/e4869a806dfa4efd9d480fda16990c52/embed"> </iframe>
                        </div>
                        @endif
                        @if($pro->arch === 'german')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                        </div>
                        @endif
                        @if($pro->arch === 'spanish')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                        </div>
                        @endif
                        <a href="{{route('contractor.details',$pro->id)}}">

                            <ul>
                                <li>Architecture : {{$pro->arch}}</li>
                                @foreach($pro->props as $prop)
                                <li style="color :#000; font-weight:bold;font-size: 18px;">Predict Price : {{ number_format($prop->PREDICTION) }} $</li>
                                @endforeach
                                <li>Publish at :  {{$pro->created_at->format('d-m-Y')}}</li>
                            </ul>

                            @if($pro->belong_to_contractor  == null)
                            <a class="btn btn-success accept" href="{{route('contractor.accept',$pro->id)}}"> <i class="icon-shopping-cart icon-large"></i> <h4>Accept</h4></a>
                            @endif
                        </a><br>

                    </div>
                </div>
            </div>
            @endforeach
        @endisset

@endsection
@section('script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 550,
    });

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
