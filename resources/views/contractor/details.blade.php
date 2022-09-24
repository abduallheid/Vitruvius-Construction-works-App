@extends('contractor.layout.app')

@section('link')
    <link rel="stylesheet" href="{{asset('css/customer/details.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@endsection

@section('title')
    Details
@endsection

@section('profile')
  @if($users->profile_picture !== NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/Profile_Picture/$users->profile_picture") }}' alt="avatar" width="40" height="40" />
  @endif
  @if($users->profile_picture == NULL)
  <img class=" rounded-circle shadow-1-strong me-3" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" width="40" height="40" />
  @endif
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
                            <span class="h3_reply" style="color:white">
                                {{$notification->user_name}} Has Added New Project
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
        <div data-aos="fade-up" data-aos-delay="150" class="container">
            @foreach($props as $prop)
            <div class="projects">
            <div data-aos="fade-up" data-aos-delay="150" class="card">
                <div class="box">
                    <div class="det">
                        <h3>Architecture</h3>
                        <h4 style="color:#1b239fe0;font-weight:bold;">{{$prop->project->arch}}</h4>

                        @if($prop->project->arch === 'Italian')
                        <div class="fram">
                        <iframe title="Petrovsky travel palace in Moscow" frameborder="0" allowfullscreen
                            mozallowfullscreen="true" webkitallowfullscreen="true"
                            allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                            execution-while-out-of-viewport execution-while-not-rendered web-share
                            src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
                        </div>
                        @endif
                        @if($prop->project->arch === 'American')
                        <div class="fram">
                        <iframe src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
                        </div>
                        @endif
                        @if($prop->project->arch === 'UK')
                        <div class="fram">
                        <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                            mozallowfullscreen="true" webkitallowfullscreen="true"
                            allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                            execution-while-out-of-viewport execution-while-not-rendered web-share
                            src="https://sketchfab.com/models/e4869a806dfa4efd9d480fda16990c52/embed"> </iframe>
                        </div>
                        @endif
                        @if($prop->project->arch === 'german')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                        </div>
                        @endif
                        @if($prop->project->arch === 'spanish')
                        <div class="fram">
                          <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                              mozallowfullscreen="true" webkitallowfullscreen="true"
                              allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                              execution-while-out-of-viewport execution-while-not-rendered web-share
                              src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(!($payment->isEmpty()))
            <div class="verified">
                <p><i class="fa fa-check-circle" aria-hidden="true"></i> Payment verified</p>
                <span>${{ number_format($prop->PREDICTION) }}+ spent</span>
            </div>
            @endif
            @if($payment->isEmpty())
            <div class="unverified">
                <p><i class="fa fa-times-circle" aria-hidden="true"></i> Payment unverified</p>
                <span>$0 spent</span>
            </div>
            @endif
        </div>
            <div class="table">
                <table>
                <tr>
                    <th>#</th>
                    <th>Properity</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td style="color :#f44336;">PREDICTION</td>
                    <td style="color :#5a3528;font-weight: bold;">{{ number_format($prop->PREDICTION)}} $</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td style="color :#f44336;">OverallQual</td>
                    <td>{{$prop->OverallQual}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td style="color :#f44336;">Neighborhood</td>
                    <td>{{$prop->Neighborhood}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td style="color :#f44336;">GrLivArea</td>
                    <td>{{$prop->GrLivArea}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td style="color :#f44336;">GarageCars</td>
                    <td>{{$prop->GarageCars}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td style="color :#f44336;">BsmtQual</td>
                    <td>{{$prop->BsmtQual}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td style="color :#f44336;">ExterQual</td>
                    <td>{{$prop->ExterQual}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td style="color :#f44336;">GarageArea</td>
                    <td>{{$prop->GarageArea}}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td style="color :#f44336;">KitchenQual</td>
                    <td>{{$prop->KitchenQual}}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td style="color :#f44336;">OverallQual</td>
                    <td>{{$prop->OverallQual}}</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td style="color :#f44336;">YearBuilt</td>
                    <td>{{$prop->YearBuilt}}</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td style="color :#f44336;">TotalBsmtSF</td>
                    <td>{{$prop->TotalBsmtSF}}</td>
                </tr>
                </table>
                <table class="continue">
                <tr>
                    <td>13</td>
                    <td style="color :#f44336;">FirstFlrSF</td>
                    <td>{{$prop->FirstFlrSF}}</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td style="color :#f44336;">GarageFinish</td>
                    <td>{{$prop->GarageFinish}}</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td style="color :#f44336;">FullBath</td>
                    <td>{{$prop->FullBath}}</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td style="color :#f44336;">YearRemodAdd</td>
                    <td>{{$prop->YearRemodAdd}}</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td style="color :#f44336;">GarageType</td>
                    <td>{{$prop->GarageType}}</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td style="color :#f44336;">FireplaceQu</td>
                    <td>{{$prop->FireplaceQu}}</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td style="color :#f44336;">Foundation</td>
                    <td>{{$prop->Foundation}}</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td style="color :#f44336;">MSSubClass</td>
                    <td>{{$prop->MSSubClass}}</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td style="color :#f44336;">TotRmsAbvGrd</td>
                    <td>{{$prop->TotRmsAbvGrd}}</td>
                </tr>
                <tr>
                    <td>22</td>
                    <td style="color :#f44336;">Fireplaces</td>
                    <td>{{$prop->Fireplaces}}</td>
                </tr>
                <tr>
                    <td>23</td>
                    <td style="color :#f44336;">Created At</td>
                    <td>{{$prop->created_at->format('d-m-Y h:i')}}</td>
                </tr>


                </table>
            </div>
            @endforeach
        </div>
    </div>
    @isset($users)
    @foreach($props as $prop)
        <div class="slide_show">
            <?php $file_2d = $prop->project->file_path;?>
            <img class="d-block w-100" src='{{ url("storage/uploads/files_2D/$file_2d") }}' alt="First slide">
        </div>
    @endforeach
    @endisset
    <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->

    <div class="comment-system">
        <h3>Comments</h3>

        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif

        @foreach($comments as $item)
        <div class="comment">
            @if($item->users->profile_picture != null)
            <?php $comment_photo = $item->users->profile_picture ?>
            <img class="" src='{{ url("storage/uploads/Profile_Picture/$comment_photo") }}' alt="avatar" />
            @endif
            @if($item->users->profile_picture == null)
            <img class="" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar"  />
            @endif

            <span class="h_3">{{ $item->users->name }}</span>
            <span class="time"> {{ $item->created_at->format('d-m-Y h:i') }}</span>
            <div class="content">{{  ucfirst($item->content) }}</div>
        </div>


        <div class="reply">

        @foreach($item->replies as $reply)
        @isset($reply)
            @if($reply->users->profile_picture !== null)
            <?php $reply_photo = $reply->users->profile_picture ?>
            <img class="" src='{{ url("storage/uploads/Profile_Picture/$reply_photo") }}' alt="avatar"  />
            @endif
            @if($reply->users->profile_picture == null)
            <img class="" src=' {{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" />
            @endif

            <span class="h3_reply">{{ $reply->users->name }}</span>
            <span class="time"> {{ $reply->created_at->format('d-m-Y h:i') }} </span>
            <div class="content">{{ ucfirst($reply->content) }}</div>
        @endisset
        @endforeach
            <!-- Add Comment -->
            <form action="{{ route('customer.reply',$item->id) }}" method="POST">
                @csrf
                <div class="form-group add ">
                    <label for="exampleInputEmail1">Reply</label>
                    <textarea name ="reply" class="form-control " aria-label="With textarea"></textarea>
                    <input class="submit btn btn-primary" type="submit" value="Send"></input>
                </div>
            </form>
            <!-- Add Comment -->
        </div>
        @endforeach
        <!-- Add Comment -->
        @if( $num_of_comments->isEmpty() )
        <form id="form_id" action="{{ route('customer.comment',$project_id) }}" method="POST">
            @csrf
            <div class="form-group add">
                <label for="exampleInputEmail1">Add Comment</label>
                <textarea name ="comment" class="form-control" aria-label="With textarea"></textarea>
                <input id="add_comment" class="submit btn btn-primary" type="submit" value="Send">
            </div>
        </form>
        @endif
        <!-- Add Comment -->
    </div>
    <!-- ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->
    <!-- start contract  -->
    <div class="maincontract">
        <div class="container">
        <div class="cont-det">
            <h2>contract</h2>
            <div class="con-sign">
            <p>Let's write the contract</p>
            <a href="">sign</a>
            </div>
        </div>

        </div>
    </div>
    <!-- end contract  -->

@endsection

@section('script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
    duration: 550,
    });
</script>
<script src=" {{asset('js/comment/reply.js')}}"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/all.js" charset="utf-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
