@extends('customer.layout.app')


@section('link')
<link rel="stylesheet" href="{{asset('css/upload/construct-style.css')}}">
<link rel="stylesheet" href="{{asset('css/all.min.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?display=swap&amp;family=Libre+Baskerville:400,700|Nunito:300,400,700" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/home.css')}}">

@endsection

@section('title')
    Upload
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
<form class="arch" method="POST" action="{{ route('customer.upload') }}" enctype="multipart/form-data">
    @csrf
    <div class="constr">
        <h1>Architectural Styles</h1>
        <p>Choose with a unique selection of different architectural styles around the world</p>
        <div class="container swiper mySwiper">
            <div class="swiper-wrapper">

                <div data-aos="fade-up" data-aos-delay="150" class="box swiper-slide">
                    <div class="fram">
                        <iframe
                            src="https://sketchfab.com/models/98620d7a356445e593a1fe71b4e9cf20/embed"></iframe>
                        </iframe>
                    </div>
                    <div class="box-det">
                        <h3>Italian<br> style</h3>
                        <p>Discover the Italian <br>architecture.</p>

                        <label>
                            <input type="radio" id="Italian" name="arch" value="Italian" class="selection">
                            <span class="one">Italian</span>
                        </label>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="300" class="box swiper-slide">
                    <div class="fram">
                        <iframe src="https://sketchfab.com/models/68041f0cb43647cd816fc71ef1715690/embed">
                        </iframe>
                    </div>
                    <div class="box-det">
                        <h3>American<br> style</h3>
                        <p>Discover the American <br>architecture.</p>

                        <label>
                            <input type="radio" id="Italian" name="arch" value="American" class="selection">
                            <span class="one">American</span>
                        </label>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="450" class="box swiper-slide">
                    <div class="fram">
                        <iframe src="https://sketchfab.com/models/59548daad6eb426c8c556ec5bb1b6721/embed">
                        </iframe>
                    </div>
                    <div class="box-det">
                        <h3>UK<br> style</h3>
                        <p>Discover the UK <br>architecture.</p>

                        <label>
                            <input type="radio" id="Italian" name="arch" value="UK" class="selection">
                            <span class="one">UK</span>
                        </label>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="450" class="box swiper-slide">
                    <div class="fram">
                        <iframe src="https://sketchfab.com/models/3432bd3ac13b4af8bf01e0a70cc46aec/embed">
                        </iframe>
                    </div>
                    <div class="box-det">
                        <h3>spanish<br> style</h3>
                        <p>Discover the spanish <br>architecture.</p>

                        <label>
                            <input type="radio" id="Italian" name="arch" value="spanish" class="selection">
                            <span class="one">spanish</span>
                        </label>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="450" class="box swiper-slide">
                    <div class="fram">
                        <iframe src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed">
                        </iframe>
                    </div>
                    <div class="box-det">
                        <h3>german<br> style</h3>
                        <p>Discover the german <br>architecture.</p>

                        <label>
                            <input type="radio" id="Italian" name="arch" value="german" class="selection">
                            <span class="one">german</span>
                        </label>
                    </div>
                </div>

            </div>

        </div>
        <hr>

    </div>
    <!---->

    <button id="btn4">
        <i class="fas fa-angle-double-up"></i>
    </button>

    <!-- start 3d,2d  -->
    <div class="pro">
        <div class="tree" id="upload">
            <div class="threedmodel">
                <h3>upload 3D model</h3>

                <input type="file" name="three" placeholder="please choose your 3d model">
            </div>
        </div>
    </div>
    <div class="thday">
        <div class="twod">
            <div class="twodmodel">
                <h3>upload 2D model</h3>
                <input type="file" name="file" required class="two">
            </div>
        </div>
    </div>
    </div>

    <div class="go">
        <div class="container">

            <h2>
                go
            </h2>
            <div class="to-p">
                <p>Please go to our app to predict the price of your house
                    and download a CSV file that predicted</p>
                <a href="https://app2.datarobot.com/applications/62cf3cd6da667eb5a51fea6f/?token=NsvaFny6U1cZGQ62hEN0VdEePiXcu6OMlMEzcl4Po_8" target="_blank">go to app</a>
            </div>
        </div>
    </div>

    <!-- start csv  -->
    <div class="csv">
        <div class="container" data-aos="fade-up" data-aos-delay="600">
            <div class="csv-con">
                <h3>upload CSV file</h3>
                <input type="file" name="csv" placeholder="upload csv " class="csv-file">
            </div>
        </div>
    </div>

    <!-- end csv  -->

    <!-- start sav -->
    <div class="sav">
        <div class="container" data-aos="fade-up" data-aos-delay="750">
            <h2>save project
            </h2>
            <div class="sav-cont">
                <p>When you save the project, it will be published automatically and an<br> alert will be sent
                    to you when a contractor chooses the project to sign <br>the contract and agreement
                </p>
                <input type="submit"  value="save">
                <!--back end her please wake up-->
            </div>
        </div>

    </div>
</form>
@endsection
@section('script')
<script src=" {{asset('js/upload/construction.js')}}"></script>
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
