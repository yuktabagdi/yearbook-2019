<!DOCTYPE html>
<html lang="en">
    <head>

      <!-- ==============================================
    Title and Meta Tags
    =============================================== -->
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">  
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Trending</title>
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
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
  

        <style type="text/css">
        /* .back{
            background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg');
          background-attachment: fixed;
        } */
        
        <style>
        /* Make the image fully responsive */
        .carousel-inner img {
          width: 100%;
          height: 100%;
        }

        @media(max-width: 500px)
                    {
                        .product-item-img{
                            height: 200px !important;
                            }
                        }   
                        .panel-body:not(.two-col) {
                        padding: 0px;
                    }

                    .glyphicon {
                        margin-right: 5px;
                    }

                    .glyphicon-new-window {
                        margin-left: 5px;
                    }

                    .panel-body .radio, .panel-body .checkbox {
                        margin-top: 0px;
                        margin-bottom: 0px;
                    }

                    .panel-body .list-group {
                        margin-bottom: 0;
                    }

                    .margin-bottom-none {
                        margin-bottom: 0;
                    }

                    .panel-body .radio label, .panel-body .checkbox label {
                        display: block;
                    }
                   
                                                          

                                      .card {
                                        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                                        transition: all 0.2s ease-in-out;
                                        box-sizing: border-box;
                                        margin-top:10px;
                                        margin-bottom:10px;
                                        background-color:#FFF;
                                      }

                                      .card:hover {
                                        box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
                                      }
                                      .card > .card-inner {
                                        padding:10px;
                                      }
                                      .card .header h2, h3 {
                                        margin-bottom: 0px;
                                        margin-top:0px;
                                      }
                                      .card .header {
                                        margin-bottom:5px;
                                      }
                                      .card img{
                                        width:100%;
                                      }
                      

                .form-group input[type="checkbox"] {
                        display: none;
                    }

                    .form-group input[type="checkbox"] + .btn-group > label span {
                        width: 50px;
                    }

                    .form-group input[type="checkbox"] + .btn-group > label span:first-child {
                        display: none;
                    }
                    .form-group input[type="checkbox"] + .btn-group > label span:last-child {
                        display: inline-block;   
                    }

                    .form-group input[type="checkbox"]:checked + .btn-group > label span:first-child {
                        display: inline-block;
                    }
                    .form-group input[type="checkbox"]:checked + .btn-group > label span:last-child {
                        display: none;   
                    }          
        </style>    
        <!-- ==============================================
    Feauture Detection
    =============================================== --> 
    
    </head>

<body>

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

  <div class="row back" >

    <div class="col-md-3 back" style="padding-top:  2.3%;">
      <section style="margin-left: 5%">

        <div class="row-1">
            <div class="card">
              <div class="card-inner">
                <button type="button" class="btn btn-outline-default waves-effect">View Bucket</button>
              </div>
            </div>
        </div>

        <div class="row-1">

            <div class="card">
              <div class="image">
                <img src="21.jpeg" />
              </div>
              <div class="card-inner">
                <div class="header">
                  SF Salsa
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck"></label>
                  </div>
                </div>
              
              </div>
            </div>

        </div>

        <div class="row-1">
            <div class="card">
              <div class="image">
                <img src="12.jpg" />
              </div>
              <div class="card-inner">
                <div class="header">
                  <div class="custom-control custom-checkbox" style = "float : left">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                    <label class="custom-control-label" for="customCheck"></label>
                  </div>
                  Old Archi Building
                </div>
              
              </div>
            </div>
        </div>
     
     </section>
    </div>
    
    <div class="col-md-6 back" style="padding-top: 1%; " >
      @if(count($images)>0)
      @php
      $count= 0;
      @endphp
          <div>
        
                  @foreach($images as $image)
                  @if(file_exists($image['thumbnail']))
                  <section class="page-section">
                    <div >
                      <div class="product-item">
                        <div class="product-item-title d-flex">
                          <div class="bg-faded p-5 d-flex ml-auto rounded">
                            <h2 class="section-heading mb-0">
                              <!--<span class="section-heading-upper">Blended to Perfection</span>-->
                              @php
                              $name = App\User::where('rollno',$image['rollno'])->get()->toArray();
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
                      <div>
                          <div >
                            <div class="cardbox" id="img{{$image['id']}}">
                              <div class="cardbox-heading">
                                <!-- START dropdown-->
                                @if($image['rollno'] == Auth::user()->rollno)
                                <div class="dropdown pull-right">
                                  <button class="btn btn-secondary btn-flat btn-flat-icon" title="Click to delete!" type="button" data-toggle="dropdown" aria-expanded="false">
                                    <em class="fa fa-ellipsis-h"></em>
                                  </button>
                                  <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item delete" href="#" id="{{$image['id']}}" data-token="{{csrf_token()}}">Delete</a>
                                  </div>
                                </div><!--/ dropdown -->
                                @endif
                                <!-- END dropdown-->
                                <div class="media m-0">
                                  <div class="d-flex mr-3">
                                    <a href="{{ url('/profile_index/'.$image['rollno']) }}">
                                      <img class="img-responsive img-circle" src="{{$name[0]['pro_pic']}}" alt="User">
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <a href="{{ url('/profile_index/'.$image['rollno']) }}">
                                      <p class="m-0">{{$name[0]['name']}}</p>
                                    </a>
                                    <small><span>{{$image['created_at']->diffForHumans() }}</span></small>
                                  </div>
                                </div><!--/ media -->
                              </div><!--/ cardbox-heading -->
          
                              <div class="cardbox-item">
                                <span class="section-heading-upper" style="font-size : 15px; margin-left : 1vw">&nbsp {{$image['caption']}}</span><br>
                                <br>
                                <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0 " src="{{$image['thumbnail']}}" data-src="{{$image['url']}}" id="{{$image['id']}}"  data-toggle="tooltip" data-placement="top" title="Click the image!" style="cursor: pointer; width: 100%;height: 380px;">
                              </div><!--/ cardbox-item -->
                              <div class="cardbox-like">
                                <ul style="top: 6px; position: relative;">
                                  <li>
                                    <div id="+{{$image['id']}}+" class="like"></div>  <!-- Like Button -->
                                  </li>
                                  <li>
                                    <button type="button" class="com btn comment_btn" id="{{$image['id']}}" style="border: none; background: none;" value="{{$image['url']}}">
                                      <i class="far fa-comment"></i> View Comments
                                    </button>
          
                                  </li>
                                </ul>


                                <ul style="top: 6px; position: relative;list-style-type: none; margin-left : -15vw">
                                  <li>
                                    @if(!empty(Auth::user()->pro_pic))
                                    <img class="img-fluid img-circle" src="{{Auth::user()->pro_pic}}" style="width: 30px; height: 30px;margin-top:-40px;" alt="Image">
                                    @else
                                    <img class="img-fluid img-circle" src="{{ asset('index.png') }}" style="width: 25px; height: 25px;margin-top:-40px;" alt="Image">  
                                    @endif
                                  </li>
                                  <li style=";">
                                    <div class="comment-body">
                                      <form class="form" id="form-comment" action="{{ url('/comment') }}" method="post">
                                        {{csrf_field()}}
                                        <ul>
                                          <li >
                                              <input id="comment-token" type="hidden" name="_token" value="{{ csrf_token() }}" style="padding-left:20px;padding-right:20px">
                                              <textarea name="comment" id="textarea" style = "width : 200%" class="form-control input-sm" rows="1" type="text" placeholder="Write your comment..." required></textarea>
                                          </li>
                                          <li> 
                                              <button class="btn" id="submit" style="height : 60%; margin-right : -30vw; margin-top : -5vh">Comment</button>
                                          </li>
                                        </ul>  
                                      </form>
                                    </div>
                                  </li>
                                </ul>
                                <script type="text/javascript"> 
                                  $(document).ready(function () {
                                    var formData = {
                                      'pic_id' : {{$image["id"]}},
                                      '_token': '{!! csrf_token() !!}',
                                    }
                                    $.ajax({
                                      url: "{{ url('/likes') }}",
                                      type: "POST",
                                      data: formData,
                                      success: function(response)
                                      {
                                        document.getElementById('+{{$image['id']}}+').innerHTML = response;
                                      },
                                      error: function(data)
                                      {
                                      }
                                    });
                                  });
                                </script>
          
                              </div><!--/ cardbox-like -->        
                            </div><!--/ cardbox -->
                          </div>
                        </div>
                
                </section>
                @endif
                @endforeach
          
                {{ $images->links('vendor.pagination.bootstrap-4')}}
                
                @else
          
                <section class="page-section cta" style="background-color: rgba(76,71,97,0.55);">
                  <div class="container">
                    <div class="row">
                      <div class="col-xl-9 ">
                        <div class="cta-inner text-center rounded">
                          <h2 class="section-heading mb-4">
                            <span class="section-heading-upper"></span>
                            <span class="section-heading-lower">Nothing to show yet</span>
                          </h2>
                          <br>
                        </div>
                      </div>
                    </div>
          
                  </div>
                </section>
                @endif
          </div>   
    </div>

    <div class="col-md-3 back" style="padding-top: 2.8%;" >
      <div style="margin-right: 5%">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-line-chart"></span> POLLS</h3>
            </div>
            <div class="panel-body">
              <div class="container">
                  <span> Polls will be up soon!</span>
            </div>
            <div class="panel-footer text-center">
                <button type="button" class="btn btn-primary btn-block btn-sm">
                    Vote</button>
                <a href="#" class="small">View Result</a>
            </div>
        </div>
    </div>
     
  </div>       
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
                @else
                <img class="img-fluid img-circle" src="{{ asset('index.png') }}" style="width: 35px; height: 35px;" alt="Image">  
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
     <div id="my-Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <input type="checkbox" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>-

  </div>
</div>
   
     <!-- ==============================================
   Scripts
   =============================================== -->
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/base.js') }}"></script>
  <script src="{{ asset('plugins/slimscroll/jquery.slimscroll.js') }}"></script>
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
    $('#trending').removeClass('p-2 nav-icon-lg dark-black');
    $('#trending').addClass('p-2 nav-icon-lg mint-green');            
  </script>

  <script>
    $('.like').click('.like', function() {
      var v = $(this).attr('id');
      var formData = {
        'pic_id' : v.split('+')[1],
        '_token' : $('#comment-token').val()
      }
      // console.log(formData);
      $.ajax({
        url: "{{ url('/likeadd') }}",
        type: "POST",
        data: formData,
        success: function(response)
        {
         document.getElementById(v).innerHTML = response;
         // console.log(response);
       },
       error: function(data)
       {
          // console.log('Error in likeadd');  
        }
      });
    });
    $('.comment_btn').click('.comment_btn', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('value'));       
      $('.enlargeImageModalSource').attr('id', $(this).attr('id'));
      $('#myModal').modal('show');
      var formData = {
        'comments' : $('textarea[name=comment]').val(),
        'pic_id' : $('.enlargeImageModalSource').attr('id'),
        '_token' : $('#comment-token').val()
      } 
      $.ajax({
        url: "{{ url('/commentadd') }}",
        type: "POST",
        data: formData,
        success: function(response)
        {
          document.getElementById("comments").innerHTML = response;
        },
        error: function(data)
        {
        }
      });
      $.ajax({
        url: "{{ url('/getimage') }}",
        type: "POST",
        data: formData,
        success: function(response)
        {
          var image = response;
          document.getElementById('profile').href = "{{url('/profile_index')}}" + '/' + image["rollno"];
          document.getElementById('image').src = image['pic'];
          document.getElementById('posted_by').innerHTML = image["name"];
          document.getElementById('created_at').innerHTML = image["created_at"];
        },
        error: function(data)
        {
        }
      });
    });
    $(function() {
      $('.product-item-img').on('click', function() {
        $('.enlargeImageModalSource').attr('src', $(this).attr('data-src'));
        $('.enlargeImageModalSource').attr('id', $(this).attr('id'));
        $('#myModal').modal('show');
        var formData = {
          'comments' : $('textarea[name=comment]').val(),
          'pic_id' : $('.enlargeImageModalSource').attr('id'),
          '_token' : $('#comment-token').val()
        }
        $.ajax({
          url: "{{ url('/commentadd') }}",
          type: "POST",
          data: formData,
          success: function(response)
          {
            document.getElementById("comments").innerHTML = response;
          },
          error: function(data)
          {
          }
        });
        $.ajax({
          url: "{{ url('/getimage') }}",
          type: "POST",
          data: formData,
          success: function(response)
          {
            var image = response;
            document.getElementById('profile').href = "{{url('/profile_index')}}" + '/' + image["rollno"];
            document.getElementById('image').src = image['pic'];
            document.getElementById('posted_by').innerHTML = image["name"];
            document.getElementById('created_at').innerHTML = image["created_at"];
          },
          error: function(data)
          {
          }
        });
      });
    });
    
    $(document).ready(function (e) {
      $('form#form-comment').on('submit', function(e) {
       e.preventDefault();
       var formData = {
        'comments' : $('textarea[name=comment]').val(),
        'pic_id' : $('.enlargeImageModalSource').attr('id'),
        '_token' : $('#comment-token').val()
      }
      // console.log(formData);
      $.ajax({
        url: "{{ url('/comment') }}",
        type: "POST",
        data: formData,
        
        success: function(response)
        {
          // console.log('Added Comments');
          document.getElementById("textarea").value="";
          document.getElementById("comments").innerHTML = response;
        },
        error: function(data)
        {
          // console.log('Error in comment');  
        }
      });
    });
    });
    $(document).ready(function() {
      $('.delete').click('.delete', function() {
        var id = $(this).attr('id');
        var token = $(this).attr('data-token');
        $.ajax({
          url: "{{ url('/delete') }}",
          type: "POST",
          data: {'id': id, '_token': token, },
          success: function(response)
          {
           document.getElementById("img"+id).innerHTML = "";
         },
         error: function(data)
         {
          // console.log('Error in likeadd');  
        }
      });
      });
    });
  </script>
  </body>
</html>