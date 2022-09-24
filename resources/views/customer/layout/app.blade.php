<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <link rel="icon" href='{{ url("storage/uploads/image-home/logo.jpeg")}}'>

        <!-- <link rel="stylesheet" href="{{asset('css/home/home.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <!-- <link rel="stylesheet" href="{{asset('css/header.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

        @yield('link')
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

        <link rel="stylesheet" href="{{asset('css/customer_dark.css')}}">

        <style>
        .swiper-slide{
        width:400px;
        }
        </style>

    </head>
    <body>
        <!-- start header  -->
        <header id="header">
            <div class="logo">
            <a href="{{route('customer.homepage')}}"><img src='{{ url("storage/uploads/image-home/logo.jpeg")}}'/></a>
            </div>

            <!-- <ul class="notification_dropdown1">

                <li class="notify_icon1">
                    <span class="count_notify1" data-count="1">1</span>
                    <i class="fas fa-bell"></i>
                </li>

                <li>
                    <h2>Notifications</h2>
                    <div class ="pop_up_notify1">

                        <div class="pop_up_container1">
                            <img class="" src='{{asset("image-home/profile.jpg")}}' alt="avatar"  />
                            <span class="h3_reply">
                                mahmoud has commented to your post mahmoud has commented to your post
                            </span>
                            <span class="time"> 20-6-2022 </span>
                        </div>
                    </div>
                </li>
            </ul> -->

            <ul class="navigation">
                <li><a class="accept" href="{{route('customer.homepage')}}" value = "Home">Home</a></li>
                <li><a href="{{route('customer.construction_style')}}" value = "Upload">Upload</a></li>
                <li><a href="{{route('customer.your_project')}}" value = "Your Project">Your Project</a></li>
                <li><a href="{{route('customer.paymentDefault')}}" value = "Payment">Payment</a></li>
                <li class="icon_profile">
                    @yield('profile')
                </li>
                <li>
                    <div class="arrow-up"></div>
                    <div class ="pop_up">
                        <a href="{{ route('customer.your_project') }}" value = "Your Projects">Your Projects</a>
                        <a href="{{ route('customer.profile') }}" value = "Profile">Profile</a>
                        <a href="{{ route('logout') }}">Log Out</a>
                    </div>
                </li>
                <li>
                    <div class="arrow-up"></div>
                    <div class ="pop_up">
                        <a href="{{ route('customer.your_project') }}" value = "Your Projects">Your Projects</a>
                        <hr>
                        <a href="{{ route('customer.profile') }}" value = "Profile">Profile</a>
                        <hr>
                        <a href="{{ route('logout') }}">Log Out</a>
                    </div>
                </li>


            </ul>
            <div class="bars" data-aos="zoom-in" data-aos.delay="50">
                <i id="bar" class="fas fa-bars"></i>
            </div>

            <div class="mode" data-aos="zoom-in" data-aos.delay="50">
                <i id="check" onclick="changeStatus()" class="fa-solid fa-moon"></i>
            </div>

        </header>
    <!-- end header  -->
        <main>
            @yield('content')
            @yield('scrollTop')
            <button id="btn1">
                <i class="fas fa-angle-double-up"></i>
            </button>
        </main>
        @yield('script')
        <script src="{{asset('js/landing.js')}}"></script>


        <script src=" {{asset('js/header.js')}}"></script>
        <script src=" {{asset('js/home/edit.js')}}"></script>
        <script src=" {{asset('js/home.js')}}"></script>
        <!-- <script src=" {{asset('js/home2.js')}}"></script> -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Pusher script  -->
        <script src="https://js.pusher.com/7.1/pusher.min.js"></script>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
        AOS.init({
            duration: 800,
        });
        </script>
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

    </body>
</html>
