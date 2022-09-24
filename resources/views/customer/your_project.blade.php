@extends('customer.layout.app')

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
    Your Project
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

<div class="title">
    <div class="container">
        <div class="info">
            <h3>Your project</h3>
        </div>
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
        <div class="projects">
        @isset($customer)
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
                              src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
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
                        <a href="{{route('customer.details',$pro->id)}}">
                            <ul>
                                <li>Architecture : {{$pro->arch}}</li>
                                @foreach($pro->props as $prop)
                                <li style="color :#000; font-weight:bold">Predict Price : {{ number_format($prop->PREDICTION) }} $</li>
                                @endforeach
                                <li>Publish at : {{$pro->created_at->format('d-m-Y')}}</li><br>
                            </ul>
                        </a><br>
                        <div class="card_buttons">
                            @if($pro->payment_status == 0)
                            <a href="{{route('customer.payment',$pro->id)}}" class=" btn btn-success " style="background-color:green; font-weight:bold; color:white"><h3>Pay</h3></a><br>
                            @endif
                            @if($pro->payment_status != 0)
                            <a href="" class=" btn " style="background-color:grey; font-weight:bold; color:white"><h3>Paied</h3></a><br>
                            @endif
                            <!-- <form action="{{route('customer.delete_project',$pro->id)}}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-danger delete delete-confirm" style="background-color:Red; font-weight:bold; color:white" value="Delete">
                            </form> -->
                            <a href="{{route('customer.delete_project',$pro->id)}}" onclick='return confirm("Are you sure?")' class=" btn btn-danger delete-confirm" style="font-weight:bold; color:white"><h3>Delete</h3></a><br>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endisset
        </div>
    </div>
</div>
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
