@extends('customer.layout.app')

@section('link')
    <link rel="stylesheet" href="{{asset('css/customer/details.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?display=swap&amp;family=Libre+Baskerville:400,700|Nunito:300,400,700" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&family=Open+Sans:ital,wght@0,300;0,400;1,600&family=Work+Sans:wght@200;300;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

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

@section('content')
    <!-- ========================  Properties Table  ============================== -->

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
    <!-- ========================  2D File ============================== -->
    @isset($users)
    @foreach($props as $prop)
        <div class="slide_show">
            <?php $file_2d = $prop->project->file_path;?>
            <img class="d-block w-100" src='{{ url("storage/uploads/files_2D/$file_2d") }}'  alt="First slide">
        </div>
    @endforeach
    @endisset
    <!-- =======================  comment-system ========================= -->

    <div class="comment-system">

        <h3>Comments</h3>

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
            <i class="fas fa-star icon_star "></i>
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
                <img class="" src='{{ url("storage/uploads/image-home/profile.jpg") }}' alt="avatar" />
                @endif

                <span class="h3_reply">{{ $reply->users->name }}</span>
                <span class="time"> {{ $reply->created_at->format('d-m-Y h:i') }} </span>
                <div class="content">{{ ucfirst($reply->content) }}</div>
            @endisset
            @endforeach

            <!-- Add Comment -->
            <form id="reply_form" action="{{ route('customer.reply',$item->id) }}" method="POST">
                @csrf
                <input id="comment_id"  type="hidden" value="{{$item->id}}"></input>
                <div class="form-group add ">
                    <label for="exampleInputEmail1" style="margin-bottom:5px;">Reply</label>
                    <textarea name ="reply" class="form-control reply_field" aria-label="With textarea"></textarea>
                    <input id="add_reply" class="submit btn btn-primary" type="submit" value="Send"></input>
                </div>
            </form>
            <!-- Add Comment -->
        </div>
        @endforeach
        <!-- Add Comment -->
        @if( $num_of_comments->isEmpty() )
        <form id="comment_form" action="{{ route('customer.comment',$project_id) }}" method="POST">
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

    <!-- =======================  contract ========================= -->

    <!-- start contract  -->
    <div class="maincontract">
        <div class="container">
            <div class="cont-det">
                <h2>contract</h2>
                <div class="con-sign">
                <p>Let's write the contract</p>
                <a href="}">sign</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <embed src="{{asset('contract/contract.pdf')}}" data-aos="zoom-in" data-aos-delay="150"> -->
    <!-- end contract  -->

@endsection

@section('script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
    duration: 550,
    });
</script>
<script src=" {{asset('js/comment/details.js')}}"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/all.js" charset="utf-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

<script>
        $(document).on('click','#add_reply',function(e){
            e.preventDefault();


            var formData = new FormData($('#reply_form')[0]);
            var id = $('#comment_id').val();
            var url = '{{ route("customer.reply", ":id") }}';
            url = url.replace(':id', id);


            $.ajax({
                type:'post',
                enctype:'multipart/form-data',
                url:url,
                data:formData,
                processData:false,
                contentType:false,
                cache:false,
                success:function(data){
                    if(data.status == true)
                        console.log("Good");
                        // window.location = url;
                },
                error:function(reject){
                    // var data = $.parseJSON(reject.responseText);
                    // $.each(data.errors,function(key,val){
                    //     $('#'+ key +'_error').text(val[0]);
                    // });
                    console.log("Bad");

                }
            });
        });
    </script>
@endsection
