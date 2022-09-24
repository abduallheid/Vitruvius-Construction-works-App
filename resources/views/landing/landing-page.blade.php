<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>landing page</title>
        <link href="css/all.min.css" rel="stylesheet">
        <link rel="icon" href="{{ url('image-home/logo.jpeg') }}">
        <link rel="stylesheet" href="{{asset('css/landing.css')}}">
        <link
            href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap"
            rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&family=Nunito+Sans:wght@300;400&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap"
            rel="stylesheet">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
        <style>
            .swiper-slide {
                width: 400px;
            }
            li {
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                margin: auto;
            }
            .mn:focus {
                color: red;
            }
        </style>
    </head>

    <body>
        <!-- start header  -->
        <header id="header">
            <div class="logo" data-aos="zoom-in" data-aos.delay="50">
                <a href="{{route('landing-page')}}">
                    <img src='{{url("storage/uploads/image-home/logo.jpeg")}}' alt="">
                </a>
            </div>
            <ul class="navigation" data-aos="zoom-in" data-aos.delay="50">


                <li><a class="accept" href="{{route('landing-page')}}">Home</a></li>
                <li><a href="#road-map">Road Map</a></li>
                <li><a href="#app">Mobile App</a></li>
                <li><a href="#contact">Contact Us</a></li>
                <li><a href="#about-us">About Us</a></li>


                <li><a href="{{route('login')}}">Log In</a></li>
                <li><a href="{{route('sign_up')}}">Sign Up</a></li>

            </ul>
            <div class="bars" data-aos="zoom-in" data-aos.delay="50">
                <i id="bar" class="fas fa-bars"></i>
            </div>

            <div class="mode" data-aos="zoom-in" data-aos.delay="50">
                <i id="check" onclick="changeStatus()" class="fa-solid fa-moon"></i>
                <div class="arrow-up"></div>
                <ul class="color">
                    <li class="set" data-color="#00838f" id="main"></li>
                    <li data-color="#E91E63" id="second2"></li>
                    <li data-color="#006400" id="three3"></li>
                    <li data-color="blue" id="four4"></li>
                    <li data-color="#663399" id="five5"></li>
                    <li data-color="#03A9F4" id="sex6"></li>
                </ul>
            </div>


        </header>
        <!-- end header  -->

        <!-- start landing  -->
        <div class="landing">
            <div class="container">
                <div class="text">
                    <div data-aos="fade-up" data-aos.delay="100" class="con-text">
                        <h1>Welcome To <span class="man"> Vitruvius</span> </h1>
                        <p>This Site Specializes In Construction. It's Available To Carry Out Any Project For Our Clients Whether By Sending 3D/2D Models Of Private Projects Or Choosing From Our Site. Moreover, Our Clients Can Send Us Models To Calculate The Costs For Them.
                        </p>
                    </div>
                    <div class="content-image">
                        <img data-aos="fade-up" data-aos.delay="100" src='{{asset("image-home/myon.svg")}}'alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- end landing  -->

        <!-- start up  -->
        <button id="btn1">
            <i class="fas fa-angle-double-up"></i>
        </button>
        <!-- end up  -->
        <!-- start video  -->
        <div class="bg-show">
            <div class="link">
                <a href="#">play <i class="fa-solid fa-angle-right"></i>
                </a>
            </div>
            <div class="overlay">
                <div class="ico">
                <i class="fa-solid fa-x"></i>
                <video src="{{asset('video/video.mp4')}}"  id="video" controls></video>
                </div>
            </div>
        </div>

    <!-- start road map -->
    <div class="road-map" id="road-map">
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
    <!-- start app  -->
    <div class="app" id="app" data-aos="zoom-in" data-aos.delay="350">
      <div class="main-title">
        <h1>mobile app</h1>
      </div>
      <div class="container">
        <div class="img-app">
          <img src="{{asset('image-home/constapp.svg')}}" alt="">
        </div>
        <div class="about-app">

          <a class="gog" href="#"><i class="fa-brands fa-google-play"></i>
            <p> get it on<br>
              <span>google play</span>
            </p>
          </a>
        </div>
      </div>
    </div>
        <!-- start contact us  -->
        <div class="contact" id="contact">
            <div class="main-title">
                <h1>contact us</h1>
            </div>
            <div class="container">
                <form action="" data-aos="fade-up" data-aos.delay="400">
                    <div class="left">
                        <input type="text" name="username" placeholder="your name">
                        <input type="number" name="phone" placeholder="your phone">
                        <input type="email" name="email" placeholder="your Email">
                        <input type="text" name="subject" placeholder="your subject">
                    </div>
                    <div class="right">
                        <textarea name="sms" id="" placeholder="your message"></textarea>
                        <input type="submit" value="send" name="send">
                    </div>
                </form>
            </div>
        </div>
        <!-- end contact us  -->

        <!-- start about us  -->
        <div id="about-us" class="about-us">
            <!-- <h2>what they're saying about us</h2> -->
            <div class="main-title">
                <h1>about us</h1>
            </div>
            <div class="container swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="box swiper-slide">
                        <div class="img">
                            <img src='{{asset("image-home/rawwwak.jpeg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>Abduallh Eid</h3>
                            <p>Data Scientist & Machine Learning En </p>
                            <div class="icon-about">

                                <a href="https://www.facebook.com/abduallh.eid.1">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/abduallheid">
                                    <i class="fa-brands fa-github"></i>
                                </a>

                                <a href="https://www.linkedin.com/in/abduallheid">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box swiper-slide">

                        <div class="img">
                            <img src='{{asset("image-home/el rooby.jpg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>ahmed el rooby</h3>
                            <p>front end developer</p>
                            <div class="icon-about">
                                <a href="https://www.facebook.com/profile.php?id=100012194289790">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/ahmed-elrooby">
                                    <i class="fa-brands fa-github"></i>
                                </a>

                                <a href="https://www.linkedin.com/in/ahmed-elroby-124886239/">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box swiper-slide">
                        <div class="img">
                            <img src='{{asset("image-home/hassan.jpeg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>Ahmed Hassan</h3>
                            <p>Flutter Developer </p>
                            <div class="icon-about">
                                <a href="https://www.facebook.com/profile.php?id=100011272024539">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/ahmedhassan134"><i class="fa-brands fa-github"></i></a>
                                <a href="https://www.linkedin.com/in/ahmed-hasan-b195b61a5"><i
                                        class="fa-brands fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="box swiper-slide">

                        <div class="img">
                            <img src='{{asset("image-home/mego.jpeg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>Mahmoud Magdy</h3>
                            <p>Full stack web Developer </p>
                            <div class="icon-about">
                                <a href="https://www.facebook.com/profile.php?id=100006423698742">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/mahmoudmagdy10">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                                <a
                                    href="https://www.linkedin.com/in/mahmoud-magdy-6b3653216/?fbclid=IwAR2Ci58UvT2dgFwdMkmXKaoKOajF0DSJ5KoLr4RUA__HB5XBTHkAHm7xJvg">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box swiper-slide">
                        <div class="img">
                            <img src='{{asset("image-home/hema.jpeg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>Ibrahim EL Hossiny</h3>
                            <p>Python Developer</p>
                            <div class="icon-about">
                                <a href="https://www.facebook.com/hema.hussain.73700">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/IbrahemHussein">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                                <a href="https://www.linkedin.com/in/ibrahem-hussaein-a5891b218">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="box swiper-slide">
                        <div class="img">
                            <img src='{{asset("image-home/fouad.jpeg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>Mohamed Fouad</h3>
                            <p>front end developer</p>
                            <div class="icon-about">
                                <a href="https://www.facebook.com/profile.php?id=100079939207102">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/mohammedfouad14"><i class="fa-brands fa-github"></i></a>
                                <a href="https://www.linkedin.com/in/mohammed-fouad-82268b242/"><i
                                        class="fa-brands fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="box swiper-slide" width="400px">
                        <div class="img">
                            <img src='{{asset("image-home/haza.jpeg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>Abd-Elrahman Tarek</h3>
                            <p>cyber security python developer</p>
                            <div class="icon-about">
                                <a href="https://m.facebook.com/abdotarek.elhza">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/Abdelrahman-Tarek22"><i class="fa-brands fa-github"></i></a>
                                <a href="https://www.linkedin.com/in/abdelrahman-tarek-8731b019b">
                                    <i class="fa-brands fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="box swiper-slide" width="400px">
                        <div class="img">
                            <img src='{{asset("image-home/amin2.jpeg")}}' alt="">
                        </div>
                        <div class="box-date">
                            <h3>Amin Mahmoud</h3>
                            <p>frontEnd developer</p>
                            <div class="icon-about">
                                <a href="https://www.facebook.com/profile.php?id=100005074876094">
                                    <i class="fa-brands fa-facebook-square"></i>
                                </a>
                                <a href="https://github.com/aminelgendyy">
                                    <i class="fa-brands fa-github"></i>
                                </a>
                                <a
                                    href="https://www.linkedin.com/in/%D8%A7%D9%85%D9%8A%D9%86-%D8%A7%D9%84%D8%AC%D9%86%D8%AF%D9%89-amin-elguindy-067a4620b">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about us  -->
        <div class="footer">
            <div class="container" >
                <div class="box-1">
                    <img src= '{{url("storage/uploads/image-home/WhatsApp Image 2022-05-11 at 4.35.41 PM.jpeg")}}'>
                    <p>This site specializes in construction. It's available to carry out any project for our clients
                        whether by sending 3D/2D models of private projects or choosing from our site. Moreover, our
                        clients can send us models to calculate the costs for them.</p>
                </div>
                <br>
                <div class="box-2">
                    <h2>Permalinks</h2>
                    <ul class="navigation">
                        <li><a class="accept" href="{{route('landing-page')}}">Home</a></li>
                        <li><a href="#road-map">road map</a></li>
                        <li><a href="#app">mobile app</a></li>
                        <li><a href="#contact">contact us</a></li>
                        <li><a href="#about-us">about us</a></li>
                        <li><a href="{{route('login')}}">Log In</a></li>
                        <li><a href="{{route('sign_up')}}">Sign Up</a></li>
                    </ul>
                </div>
                <hr style="height:1px ;background-color:white;width:100%">
                <span
                    style="color: white;display:flex; justify-content:center;align-items:center;text-align:center;margin:auto;margin-top:16px;text-transform:capitalize;letter-spacing:1.1px;font-size:18px">All
                    Rights Reversed</span>
            </div>
        </div>
        <!-- end footer  -->

        <script src="{{asset('js/landing.js')}}"></script>

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

    </body>

</html>
