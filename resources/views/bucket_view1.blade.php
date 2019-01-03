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
    <link rel="stylesheet" type="text/css" href="css/autocomplete.css">
      <link rel="icon" href="img/logo.jpg">
      <link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png">
      <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
      <!-- ==============================================
    CSS
    =============================================== -->
        <link type="text/css" href="css/demos/photo.css" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

        
    <!-- ==============================================
    Feauture Detection
    =============================================== -->
    <script src="js/jquery.min.js"></script>
      <script src="js/autocomplete.js"></script>
      <script src="js/modernizr-custom.js"></script>  
    <style type="text/css">
      .back{
      background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg');
      background-attachment: fixed;
      }
      .article{
    background-color: #ffffff;
    border-radius: 10px;
  }
    </style>
    </head>

<body>

     <!-- ==============================================
     Navigation Section
     =============================================== -->  
     <header class="tr-header">
      <nav class="navbar navbar-default">
       <div class="container-fluid">
      <div class="navbar-header">
     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="index.html"><img src="img/navbar/SACLogo.png" width="150px" height="75px" style="margin-top:-23px;" /></a>
    </div><!-- /.navbar-header -->
    <div class="navbar-left">
     <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav">
      </ul>
     </div>
    </div><!-- /.navbar-left -->
    <div class="navbar-right">                          
     <ul class="nav navbar-nav">
       <li>
         <div class="search-dashboard">
          <form action="search/" method="POST" class="form-inline">
            {{ csrf_field() }}
            <input placeholder=" Search Your Friend Here..." type="text" name="search" required="required" id="search" style="background: none; border: none; padding-top: 3px; padding-left: 20px; line-height: 40px; cursor: text; font-size: 14px;">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>              
       </li>
       <li class="">
            <a class="text-uppercase text-expanded" href="/homenew">Home
              <span class="sr-only">(current)</span>
            </a>
        </li>

        <li class="active">
            <a class="text-uppercase text-expanded" href="trendingnew"  data-step="5" data-intro="<center> See the most popular photos of Kgpians </center> ">Trending</a>
         </li>
       <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="notification" role="button"
         aria-haspopup="false" aria-expanded="false">
          @if(count($notifications) || count($comment_notification))
          <i class="fa fa-bell noti-icon"></i>
          <span class="badge badge-danger badge-pill noti-icon-badge">
            {{count($notifications) + count($comment_notification)}}
          </span>
          @else
          <i class="fa fa-bell noti-icon"></i>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

          <div class="dropdown-item noti-title">
            <h6 class="m-0">
              <span class="pull-right">
                <a href="/readall" class="text-dark">
                  <small>Clear All</small>
                </a> 
              </span>
              <span style="color: #000;">Notifications({{count($notifications) + count($comment_notification)}})</span> 
            </h6>
          </div>

      <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 416.983px;">
        <div class="slimscroll" style="max-height: 300px; overflow: hidden; width: auto; height: 416.983px;">
         <div id="Slim">
          @if(count($comment_notification))
          @foreach($comment_notification as $notification)
          @php
          $url = App\Image::where('id', $notification['pic_id'])->value('url');
          @endphp
          <button class="dropdown-item notify-item comment_notification" id="{{$notification['pic_id']}}" value="{{$url}}">
            @php
            $commentedBy = App\User::where('id', $notification['user_id'])->pluck('name');
            $pic = App\User::where('id', $notification['user_id'])->pluck('pro_pic');
            @endphp
            <div class="notify-icon">
              <img src="../{{$pic[0]}}" class="img-responsive img-circle">
            </div>
            <p class="notify-details" style="font-family: Verdana">
              <strong>{{$commentedBy[0]}}</strong> commented on your post: <br>
              <span>&nbsp"{{$notification['comments']}}"</span>
              <small class="text-muted">{{$notification['created_at']}}</small>
            </p>
          </button><!--/ dropdown-item-->
          @endforeach
          @endif
          @if(count($notifications))
          @foreach($notifications as $notification)
          <a href="/read/{{$notification['id']}}" class="dropdown-item notify-item">
            @php
            $pic = App\User::where('name',$notification['user'])->pluck('pro_pic');
            @endphp
            <div class="notify-icon">
              <img src="../{{$pic[0]}}" class="img-responsive img-circle">
            </div>
            <p class="notify-details" style="font-family: Verdana">
              <strong>{{$notification['user']}}</strong> wrote :<br>
              <span>&nbsp"{{$notification['views']}}"</span>
              <small class="text-muted">{{$notification['created_at']}}</small>
            </p>
          </a><!--/ dropdown-item-->
          @endforeach
          @endif

          @if(count($notifications) + count($comment_notification) == 0)
          <div class="notify-details" align="center">No New Notifications!</div>
          @endif

          </div><!--/ .Slim-->
          <div class="slimScrollBar" style="background: rgb(158, 165, 171); none repeat scroll 0% 0%; width: 8px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
          <div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
        </div><!--/ .slimscroll-->
      </div><!--/ .slimScrollDiv-->
      <div class="dropdown-item text-center" style="height: 30px; background-color: #f4f4f4;">
        
      </div><!-- All-->
    </div><!--/ dropdown-menu-->
  </li>


  <li class="dropdown notification-list">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
      <i class="fa fa-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-lg" style="width: 100px; height:100.983px; left:-160px;">     
      <div class="dropdown-item noti-title">
        <h6 class="m-0">
          <span class="pull-right">
            <a href="photo_profile.html" class="text-dark"></a> 
          </span>Settings
        </h6>
      </div>

      <div >
        <a class="dropdown-item " href="/details"><p style="font-family: 'Abhaya Libre', serif;">Edit Details</p></a>
      </div>
      <div >
        <a class="dropdown-item " href="/logout"><p style="font-family: 'Abhaya Libre', serif;">Logout</p> </a>
      </div>

    </div><!--/ dropdown-menu-->
  </li>  
     <li class="dropdown mega-avatar">  
      <a href="photo_profile.html#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <span class="avatar w-32">                  
          @if(!empty(Auth::user()->pro_pic))
          <img class="img-fluid img-circle" src="{{Auth::user()->pro_pic}}" style="width: 35px; height: 35px;">
          @endif
        </span>
       <!-- hidden-xs hides the username on small devices so only the image appears. -->
       <span class="hidden-xs">
      &nbsp{{Auth::user()->name}}
       </span>
      </a>
      <div class="dropdown-menu w dropdown-menu-scale pull-right">
       <a class="dropdown-item" href="photo_profile.html#"><span>New Story</span></a> 
       <a class="dropdown-item" href="photo_profile.html#"><span>Become a Member</span></a> 
       <div class="dropdown-divider"></div>
       <a class="dropdown-item" href="photo_profile.html#"><span>Profile</span></a> 
       <a class="dropdown-item" href="photo_profile.html#"><span>Settings</span></a> 
       <a class="dropdown-item" href="photo_profile.html#">Need help?</a> 
       <div class="dropdown-divider"></div>
       <a class="dropdown-item" href="photo_profile.html#">Sign out</a>
      </div>
     </li><!-- /navbar-item `--> 
     
     </ul><!-- /.sign-in -->   
    </div><!-- /.nav-right -->
       </div><!-- /.container -->
      </nav><!-- /.navbar -->
     </header><!-- Page Header --> 
  
  
   <!-- ==============================================
   Navbar Second Section
   =============================================== -->
  <section class="nav-sec">
    <div class="d-flex justify-content-between">
     <div class="p-2 nav-icon-lg mint-green">
     <a class="nav-icon" href="photo_home.html"><em class="fa fa-home"></em>
    <span>Home</span>
     </a>
     </div>
     <div class="p-2 nav-icon-lg clean-black">
     <a class="nav-icon" href="photo_explore.html"><em class="fa fa-crosshairs"></em>
    <span>Explore</span>
     </a>
     </div>
     <div class="p-2 nav-icon-lg dark-black">
     <a class="nav-icon" href="photo_upload.html"><em class="fab fa-instagram"></em>
    <span>Upload</span>
     </a>
     </div>
     <div class="p-2 nav-icon-lg clean-black">
     <a class="nav-icon" href="photo_stories.html"><em class="fa fa-align-left"></em>
    <span>Stories</span>
     </a>
     </div>
     <div class="p-2 nav-icon-lg dark-black">
     <a class="nav-icon" href="photo_profile.html"><em class="fa fa-user"></em>
    <span>Profile</span>
     </a>
     </div>
    </div>
  </section>  
  
   <!-- ==============================================
   News Feed Section
   =============================================== --> 

   <section class="newsfeed back">

   <section class="page-section article">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 mx-auto">
            <div class=" text-center rounded">
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
            <div class="container">
              <div class="row">
                <div class="col-lg-8" style="margin-left: -10vw">
                  <div class="cardbox">
                    <div class="cardbox-heading">
                      
                      <div class="media m-0">
                        
                        <div class="bg-faded p-5 d-flex ml-auto rounded">
              <i style="float: right;">{{$image['created_at']->diffForHumans() }}</i>
              <h2 class="section-heading mb-0">
                <!--<span class="section-heading-upper">Blended to Perfection</span>-->
                @php
                $name = App\User::where('rollno',$image['roll'])->get()->toArray();
               // dd($name[0]['name']);
                @endphp

                <strong>
                  @php
                  echo '#';
                  $count1 = $count + ($currentpage*$perpage ) -($perpage-1);
                  echo $count1 ;
                  $count++;
                  @endphp
                </strong>
                <span class="section-heading-lower">{{$name[0]['name']}}</span>
               
                <span class="section-heading-upper">"{{$buckets[$image['list']]}}"</span>
              
              </h2>
              
            </div>
                    </div><!--/ cardbox-heading -->

                    <div class="cardbox-item">
                      
                      <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0 " src="{{$image['pic']}}" 
                      id="{{$image['pic']}}"  data-toggle="tooltip" data-placement="top" title="Click the image!" style="cursor: pointer; width: 100%;height: 500px;">
                    </div><!--/ cardbox-item -->
                    <div class="cardbox-like">
                      <ul style="top: 6px; position: relative;">
                        <li>
                          <div id="+{{$image['id']}}+" class="like"></div>  <!-- Like Button -->
                        </li>
                        <li>
                          <button type="button" class="com btn comment_btn" id="{{$image['id']}}" style="border: none; background: none;" value="{{$image['url']}}">
                            <i class="far fa-comment"></i> Comment
                          </button>
                        </li>
                      </ul>
                      <script type="text/javascript"> 
                        $(document).ready(function () {
                          var formData = {
                            'pic_id' : {{$image["id"]}},
                            '_token': '{!! csrf_token() !!}',
                          }
                          $.ajax({
                            url: "/likes",
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
            </div>
      
      </section>
      @endif
      @endforeach

      {{ $images->links('vendor.pagination.bootstrap-4')}}
      
      @else

      <section class="page-section cta" style="background-color: rgba(76,71,97,0.55);">
        <div class="container">
          <div class="row">
            <div class="col-xl-9 mx-auto">
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
    <div class="container">
    <div class="row">
      
      
  </div>
</div>
</div>
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
              <img class="img-responsive img-circle" src="" />
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
                <form class="form" id="form-comment" action="/comment" method="post">
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
  <script src="js/bootstrap.min.js"></script>
  <script src="js/base.js"></script>
  <script src="plugins/slimscroll/jquery.slimscroll.js"></script>
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
    $('.like').click('.like', function() {
      var v = $(this).attr('id');
      var formData = {
        'pic_id' : $(this).attr('id')[1],
        '_token' : $('#comment-token').val()
      }
      // console.log(formData);
      $.ajax({
        url: "/likeadd",
        type: "POST",
        data: formData,

        success: function(response)
        {

         document.getElementById(v).innerHTML = response;

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
        url: "/commentadd",
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
          url: "/getimage",
          type: "POST",
          data: formData,

          success: function(response)
          {
            var image = response;
            document.getElementById('profile').href = "/profile_index/" + image["rollno"];
            document.getElementById('posted_by').innerHTML = image["name"];
            document.getElementById('created_at').innerHTML = image["created_at"];
          },
          error: function(data)
          {

          }
        });
    });

    $('.comment_notification').on('click', function() {
        $('.enlargeImageModalSource').attr('src', $(this).attr('value'));
        $('.enlargeImageModalSource').attr('id', $(this).attr('id'));
        $('#myModal').modal('show');
        var formData = {
          'comments' : $('textarea[name=comment]').val(),
          'pic_id' : $('.enlargeImageModalSource').attr('id'),
          '_token' : $('#comment-token').val()
        }
        $.ajax({
          url: "/commentadd",
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
          url: "/getimage",
          type: "POST",
          data: formData,

          success: function(response)
          {
            var image = response;
            document.getElementById('profile').href = "/profile_index/" + image["rollno"];
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
        $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
        $('.enlargeImageModalSource').attr('id', $(this).attr('id'));
        $('#myModal').modal('show');
        var formData = {
          'comments' : $('textarea[name=comment]').val(),
          'pic_id' : $('.enlargeImageModalSource').attr('id'),
          '_token' : $('#comment-token').val()
        }
        $.ajax({
          url: "/commentadd",
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
          url: "/getimage",
          type: "POST",
          data: formData,

          success: function(response)
          {
            var image = response;
            document.getElementById('profile').href = "/profile_index/" + image["rollno"];
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
        url: "/comment",
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
  </script>
  <script>
      var user = <?php echo $user;?>;
      // console.log(user[0].name);
      var names = [];
      for (var i = 0; i < user.length; i++) {
        names[i] = user[i].name;
      }
      // console.log('names',names);

      $(document).ready(function() {
        $('#search').autocomplete({
          source: [names]
        });   
      });
      $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  </script>

  </body>
</html>