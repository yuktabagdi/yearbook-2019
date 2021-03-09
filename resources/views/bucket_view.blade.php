<!DOCTYPE html>
<html lang="en">
    <head>

      <!-- ==============================================
    Title and Meta Tags
    =============================================== -->
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">  
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Images | Bucket List</title>
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <meta property="og:title" content="" />
      <meta property="og:url" content="" />
      <meta property="og:description" content="" />  
      <meta name="csrf-token" content="{{ csrf_token() }}">   
    
    <!-- ==============================================
    Favicons
    =============================================== --> 
      <link rel="icon" href="{{ asset('img/logo.jpg') }}">
      <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/apple-touch-icon-72x72.png') }}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png') }}">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
      <!-- ==============================================
    CSS
    =============================================== -->
        <link type="text/css" href="{{ asset('css/demos/photo.css') }}" rel="stylesheet" />
        <link type="text/css" href="{{ asset('css/demos/interest.css') }}" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

        
    <!-- ==============================================
    Feauture Detection
    =============================================== --> 
    <style type="text/css">
        #myBtn {
          display: none;
          position: fixed;
          bottom: 20px;
          right: 30px;
          z-index: 99;
          font-size: 12px;
          border: none;
          outline: none;
          color: white;
          cursor: pointer;
          padding: 15px;
          border-radius: 4px;
        }

        #myBtn:hover {
          background-color: #555;
        }
    .back{
      background-image: url('img/bg/bgbg.jpg');
      background-attachment: fixed;
    }
    .article{
      background-color: #ffffff;
      border-radius: 10px;
    }
    @media screen and (min-width: 768px){
      body {
        position: relative;
      }
      .affix {
        top: 20px;
        z-index: 9999 !important;
        height: 100%;
        overflow-y: scroll;
      }
    }
    
    </style>

    </head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="10">

     <!-- ==============================================
     Navigation Section
     =============================================== -->  
     @include('navbar')
  
  
   <!-- ==============================================
   Navbar Second Section
   =============================================== -->
   
  
   <!-- ==============================================
   News Feed Section
   =============================================== --> 

   <section class="newsfeed back">
    <section class="channel-one">
    <div class="container-fluid" >
     <div class="row" >
     
      <div class="col-md-3 col-sm-4" id="myScrollspy">
       <aside class="sidebar">      
        <ul id="side" data-spy="affix" data-offset-top="180">
         <li class="" id="0"><a href="{{ url('/viewbucket') }}"><i class="fa fa-align-left"></i> All Photos</a></li>
         <li id="1"><a href="{{ url('/viewbucket?id=1') }}"><i class="fa fa-align-left"></i> {{$buckets[1]}}</a></li>
         <li id="2"><a href="{{ url('/viewbucket?id=2') }}"><i class="fa fa-align-left"></i> {{$buckets[2]}}</a></li>
         <li id="3"><a href="{{ url('/viewbucket?id=3') }}"><i class="fa fa-align-left"></i> {{$buckets[3]}}</a></li>
         <li id="4"><a href="{{ url('/viewbucket?id=4') }}"><i class="fa fa-chart-bar"></i> {{$buckets[4]}}</a></li>
         <li id="5"><a href="{{ url('/viewbucket?id=5') }}"><i class="far fa-copy"></i> {{$buckets[5]}}</a></li>
         <li id="6"><a href="{{ url('/viewbucket?id=6') }}"><i class="fa fa-align-left"></i> {{$buckets[6]}}</a></li>
         <li id="7"><a href="{{ url('/viewbucket?id=7') }}"><i class="fa fa-users"></i> {{$buckets[7]}}</a></li>
         <li id="8"><a href="{{ url('/viewbucket?id=8') }}"><i class="fa fa-user"></i> {{$buckets[8]}}</a></li>
         <li id="9"><a href="{{ url('/viewbucket?id=9') }}"><i class="fa fa-align-left"></i> {{$buckets[9]}}</a></li>
         <li id="10"><a href="{{ url('/viewbucket?id=10') }}"><i class="fa fa-users"></i> {{$buckets[10]}}</a></li>
         <li id="11"><a href="{{ url('/viewbucket?id=11') }}"><i class="fa fa-user"></i> {{$buckets[11]}}</a></li>
         <li id="12"><a href="{{ url('/viewbucket?id=12') }}"><i class="fa fa-align-left"></i> {{$buckets[12]}}</a></li>
         <li id="13"><a href="{{ url('/viewbucket?id=13') }}"><i class="fa fa-users"></i> {{$buckets[13]}}</a></li>
         <li id="14"><a href="{{ url('/viewbucket?id=14') }}"><i class="fa fa-user"></i> {{$buckets[14]}}</a></li>
         <li id="15"><a href="{{ url('/viewbucket?id=15') }}"><i class="fa fa-align-left"></i> {{$buckets[15]}}</a></li>
         <li id="16"><a href="{{ url('/viewbucket?id=16') }}"><i class="fa fa-users"></i> {{$buckets[16]}}</a></li>
       </ul>
     </aside>     
     
   </div><!--/ col-lg-3 -->
   

<div class="col-md-4 col-sm-8">
     <section class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 col-md-10 col-sm-9 mx-auto" align="center" style='left:-7px;'>
            <div class=" text-center rounded article" style="width:59%;padding: 1vw;" >
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower">ITCH LIST</span>
              </h2><br>
              <p class="mb-0"> 
              Snaps from the Itch List we gave you.</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </section>
    @if(count($images)>0)
        <br>
        {{ $images->links('vendor.pagination.bootstrap-4')}}
        @php
        $count= 0;
        @endphp

        @foreach($images as $image)
        @if(true)
        <section class="page-section">
          <div class="container col-md-3" style="margin-left: 50px;">
            <div class="product-item">
              <div class="product-item-title d-flex">
                <div class="bg-faded p-5 d-flex ml-auto rounded">
                  <h2 class="section-heading mb-0">
                    <!--<span class="section-heading-upper">Blended to Perfection</span>-->
                    @php
                    $name = App\User::where('rollno',$image['roll'])->get();
              
                    @endphp


                  </h2>
                  <strong></strong>
                </div>
              </div>
              
           <!-- <div class="product-item-description d-flex mr-auto">
              <div class="bg-faded p-5 rounded">
                <p class="mb-0">{{$image['caption']}}</p>
              </div>
            </div>-->
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-md-7 col-lg-6 col-sm-8">
                  <div class="cardbox" id="img{{$image['pic']}}">
                    <div class="cardbox-heading">
                      <!-- START dropdown-->
                      @if($image['roll'] == Auth::user()->rollno)
                      <div class="dropdown pull-right">
                        <button class="btn btn-secondary btn-flat btn-flat-icon" title="Click to delete!" type="button" data-toggle="dropdown" aria-expanded="false">
                          <em class="fa fa-ellipsis-h"></em>
                        </button>
                        <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a class="dropdown-item delete" href="#" id="{{$image['pic']}}" data-token="{{csrf_token()}}">Delete</a>
                        </div>
                      </div><!--/ dropdown -->
                      @endif
                      <!-- END dropdown-->
                      <div class="media m-0">
                        <div class="d-flex mr-3">
                          <a href="/profile_index/{{$image['roll']}}">
                            <img class="img-responsive img-circle" src="{{$name[0]['pro_pic']}}" alt="User">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="/profile_index/{{$image['roll']}}') }}">
                            <p class="m-0">{{$name[0]['name']}}</p>
                          </a>
                          <small><span>{{$image['created_at']->diffForHumans() }}</span></small>
                        </div>
                      </div><!--/ media -->
                    </div>

                    <div class="cardbox-item">
                      
                      <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0 " src="{{$image['pic']}}"
                      id="{{$image['pic']}}"  data-toggle="tooltip" data-placement="top" style="cursor: pointer; width: 100%;max-height: 500px; min-height: 300px; height: 50vw;">
                    </div><!--/ cardbox-item -->
                            
                  </div><!--/ cardbox -->
                </div>
              </div>
            </div>
      
      </section>
      @endif
      <script type="text/javascript">
        $(document).ready(function() {
          if($(window).width() < 768) {
            document.getElementById('side').setAttribute('data-spy', ' ');
            $(window).scroll(function() {    
              var scroll = $(window).scrollTop();
              if (scroll >= 1) {
                document.getElementById('side').setAttribute('class', ' ');
              }
            });
          }
        });
      </script>

      @endforeach

      {{ $images->links('vendor.pagination.bootstrap-4')}}
      
      @else
      <script type="text/javascript">
        document.getElementById('side').setAttribute('data-spy', ' ');
      </script>
      <section class="page-section cta">
        <div class="container" style="margin-top: 20px; font-family: 'Varela Round', sans-serif;">
          <div class="row">
            <div class="col-lg-9 mx-auto">
              <div class="cta-inner text-center rounded">
                <h2 class="section-heading mb-4">
                  <span class="section-heading-upper"></span>
                  <span class="section-heading-lower">Nothing to show yet!</span>
                </h2><br>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      @endif
      
</div>
</div>
</div>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class = "fa fa-chevron-circle-up" style = "font-size : 28px"></i><br><br>Scroll to top!</button>   

</section>
</section>

<!-- ==============================================
   Modal Section
   =============================================== -->
   <div id="myModal" class="modal fade">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
         <span aria-hidden="true">×</span>
         <span class="sr-only">Close</span>
       </button>
       <div class="row">
         
        <div class="col-md-8 modal-image">
          <img class="img-responsive enlargeImageModalSource" src="" alt="Image"/>
        </div><!--/ col-md-8 -->
        <div class="col-md-4 modal-meta">
         <div class="modal-meta-top">
          <div class="img-poster clearfix">
           <a href="" id="profile">
            <img class="img-responsive img-circle" id="image" src="" />
            <strong><span style="font-size: 14px;" id="posted_by"></span></strong>
          </a>
          <span id="created_at"></span><br/>
        </div><!--/ img-poster -->
        <div id="comments"> 
        </div>
        
        <div class="modal-meta-bottom">     
          <span class="thumb-xs">
            @if(!empty(Auth::user()->pro_pic))
            <img class="img-fluid img-circle" src="{{Auth::user()->pro_pic}}" style="width: 35px; height: 35px;" alt="Image">
            @endif       
          </span>
          <div class="comment-body">
            <form class="form" id="form-comment" action="{{ url('/comment') }}" method="post">
              {{csrf_field()}}
              <input id="comment-token" type="hidden" name="_token" value="{{ csrf_token() }}">
              <textarea name="comment" id="textarea" class="form-control input-sm" rows="2" type="text" placeholder="Write your comment..." required></textarea>
              <div align="right">
                <button class="btn" id="submit" style="margin-top: 10px;"><span>Comment</span></button>
              </div>
            </form>
          </div><!--/ comment-body -->        
        </div><!--/ modal-meta-bottom -->

      </div><!--/ modal-meta-top -->
    </div><!--/ col-md-4 -->
    
  </div><!--/ row -->
</div><!--/ modal-body -->

</div><!--/ modal-content -->
</div><!--/ modal-dialog -->
</div><!--/ modal -->
     <!-- ==============================================
   Scripts
   =============================================== -->
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('js/base.js') }}"></script>
   <script src="{{ asset('plugins/slimscroll/jquery.slimscroll.js') }}"></script>
   <script>
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
   <script>            
      $('#viewbucket').removeClass('p-2 nav-icon-lg dark-black');
      $('#viewbucket').addClass('p-2 nav-icon-lg mint-green');            
  </script>
   <script>
    $('#Slim,#Slim2').slimScroll({
      height:"auto",
      position: 'right',
      railVisible: true,
      alwaysVisible: true,
      size:"8px",
    });   
  </script>
  <script>
    $(document).ready(function() {
      $('.delete').click('.delete', function() {
        var pic = $(this).attr('id');
        var token = $(this).attr('data-token');
        $.ajax({
          url: "{{ url('/bucketdelete') }}",
          type: "POST",
          data: {'pic': pic, '_token': token, },

          success: function(response)
          {

           document.getElementById("img"+pic).innerHTML = "";
           // console.log("img"+pic);
         },
         error: function(data)
         {
          // console.log('Error in likeadd');  
        }
      });
      });
    });
    $('#<?php echo $listid; ?>').addClass('active');
  </script>
<!-- @include('footer') -->
</body>
</html>