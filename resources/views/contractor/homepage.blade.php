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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@endsection

@section('title')
    Home
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
    <!-- start landing  -->
    <div class="home" id="home" style=" background-color: rgb(80,80,80);">
      <div data-aos="zoom-in" data-aos-delay="50" class="container">

        <div class="content"></div>
        <div class="details">
          <h1 id="text"></h1>
        </div>
      </div>
    </div>

    <!-- start section  -->
    <div class="section">
      <div class="container">
        <div class="text">
          <div class="content-image">
            <img data-aos="fade-up" data-aos.delay="100" src="{{asset('image-home/undraw_building_re_xfcm.svg')}}" alt="">
          </div>
          <div data-aos="fade-up" data-aos.delay="150" class="con-text">
          <h1>Welcome To <span class="man"> Vitruvius</span></h1>
            <p>We are facilitating the creation of your Project from scratch to finish.<br>
                Follow The Road Map
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- end section  -->
    <!-- start road map -->
    <div class="road-map">
      <div class="main-title" data-aos="fade-up" data-aos.delay="200">
        <h1>road map</h1>
      </div>
      <div class="container" data-aos="fade-up" data-aos.delay="250">
        <h1 class="heading">Customer Road Map</h1>
        <div class="cont-map">
          <div class="right">
            <h2>Upload Your Building</h2>
            <p>Choose Your Architecture Style or Upload Your 3D Style File<br>
                Upload Your 2D Style File<br>
                Go To Our Model To get Your CSV File<br>
                Upload CSV File

            </p>
          </div>
          <div class="clear"></div>
          <div class="left">
          <h2>Publish </h2>
            <p>If You Agree To The Predict Price Save your Project To Get Contractors' Offers</p>
          </div>
          <div class="clear"></div>
          <div class="right">
            <h2>Complete Your Building's Payment</h2>
          </div>
          <div class="clear"></div>
          <div class="left">
            <h2>Comments</h2>
            <p>Communicate With Contractors And Get Offer</p>
          </div>

          <div class="clear"></div>
          <div class="right">
            <h2>Contract</h2>
            <p>Get Good Offer And Sign Contract.</p>
          </div>
          <div class="clear"></div>
          <div class="clear"></div>

        </div>
      </div>
      <br>
      <br>
      <div class="container" data-aos="fade-up" data-aos.delay="300">
        <h1 class="heading">Contractor Road Map</h1>

        <div class="cont-map">
          <div class="right">
            <h2>Select Project</h2>
            <p>Explor And Choose Project Suitable With You </p>
          </div>
          <div class="clear"></div>
          <div class="left">
            <h2>Make Offer</h2>
            <p>Communicate With Customer Make Offer</p>
          </div>

          <div class="clear"></div>
          <div class="right">
            <h2>Complete Your Building's Payment</h2>
          </div>

          <div class="clear"></div>
          <div class="left">
          <h2>Contract</h2>
            <p>Get Good Offer And Sign Contract.</p>
          </div>
          <div class="clear"></div>


        </div>
      </div>
    </div>
    <!-- end road map -->

    <!-- start footer  -->

    <div class="footer">
      <div class="container">
        <div class="box-1">
            <img src="{{asset('image-home/WhatsApp Image 2022-05-11 at 4.35.41 PM.jpeg')}}" alt="">
            <p>This site specializes in construction. It's available to carry out any project for our clients whether by
                sending 3D/2D models of private projects or choosing from our site. Moreover, our clients can send us models
                to calculate the costs for them.</p>
        </div>
        <br>
        <div class="box-2">
          <h2>Permalinks</h2>
          <ul class="navigation">
            <li><a class="accept" href="{{route('contractor.homepage')}}" target=_blank value = "Home">Home</a></li>
            <li><a href="{{route('contractor.explor')}}" target=_blank value = "Explor">Explor</a></li>
            <li><a href="{{route('contractor.your_project')}}" target=_blank value = "Your Project">Your Project</a></li>
            <li><a href="project.html" value = "Payment" target=_blank>Payment</a></li>
            <li><a href="">about us</a></li>
            <li><a href="{{route('login')}}" target=_blank>sign in</a></li>
            <li><a href="{{route('sign_up')}}" target=_blank>sign up</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- end footer-->
@endsection

@section('script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 800,
      });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        autoplay: true,
        speed: 800,
        breakpoints: {
          // when window width is >= 320px
          576: {
            slidesPerView: 2,
            spaceBetween: 30
          },
          // when window width is >= 480px
          768: {
            slidesPerView: 3,
            spaceBetween: 10
          },
          // when window width is >= 640px
          991: {

            slidesPerView: 3,
            spaceBetween: 20
          },
        }
        ,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      }

      );
    </script>

@endsection
