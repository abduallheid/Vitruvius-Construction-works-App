<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="icon" href='{{ url("storage/uploads/image-home/logo.jpeg")}}  '>

        <!-- <link rel="stylesheet" href="{{asset('css/home/home.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/home.css')}}">
        <!-- <link rel="stylesheet" href="{{asset('css/header.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/customer_dark.css')}}">


        @yield('link')
        <link rel="stylesheet" href="css/home.css">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
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
                <a href="{{route('contractor.homepage')}}"><img src='{{asset("image-home/logo.jpeg")}}'/></a>
            </div>

            @yield('notification')

            <ul class="navigation">
                <li><a class="accept" href="{{route('contractor.homepage')}}" value = "Home">Home</a></li>
                <li><a href="{{route('contractor.explor')}}" value = "Explor">Explore</a></li>
                <li><a href="{{route('contractor.your_project')}}" value = "Your Project">Your Project</a></li>
                <li><a href="{{route('contractor.paymentDefault')}}" value = "Payment">Payment</a></li>
                <li class="icon_profile">
                    @yield('profile')
                </li>
                <li>
                    <div class="arrow-up"></div>
                    <div class ="pop_up">
                        <a href="{{ route('contractor.interested_projects') }} " value = "My Projects">Interested In </a>
                        <a href="{{ route('contractor.profile') }}" value = "Profile">Profile</a>
                        <a href="{{ route('logout') }}">Log Out</a>
                    </div>
                </li>
            </ul>
            <div class="bars">
                <i id="bar" class="fas fa-bars"></i>
            </div>
            <div class="mode">
                <i class="fa-solid fa-moon"></i>
            </div>
        </header>
    <!-- end header  -->
        <main>
            @yield('content')
            <button id="btn1">
                <i class="fas fa-angle-double-up"></i>
            </button>

        </main>
        @yield('script')
        <script src=" {{asset('js/header.js')}}"></script>
        <script src=" {{asset('js/home/edit.js')}}"></script>
        <script src=" {{asset('js/home.js')}}"></script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Pusher script  -->
        <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
        <script>

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('6def5b4303fc5ed6f28a', {
            cluster: 'mt1'
            });

        </script>
        <script src=" {{asset('js/notification/pusherNotificationContractor.js')}}"></script>
        <!-- <script src=" {{asset('js/notification/pusherNotification.js')}}"></script> -->
        <script src=" {{asset('js/app.js')}}"></script>
        <script src=" {{asset('js/bootstrap.js')}}"></script>


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

    </body>
</html>
