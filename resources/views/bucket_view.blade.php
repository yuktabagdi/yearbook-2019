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
     @include('navbar')
  
  
   <!-- ==============================================
   Navbar Second Section
   =============================================== -->
   
  
   <!-- ==============================================
   News Feed Section
   =============================================== --> 

   <section class="newsfeed back">

   <section class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 mx-auto" align="center">
            <div class=" text-center rounded article" style="width:70%;padding: 1vw" >
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
                <div class="col-lg-8" style="margin-left: -10vw">
                  <div class="cardbox">
                    <div class="cardbox-heading">
                      <!-- START dropdown-->
                      <div class="dropdown pull-right">
                        <button class="btn btn-secondary btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
                          <em class="fa fa-ellipsis-h"></em>
                        </button>
                        <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a class="dropdown-item" href="photo_home.html#">Hide post</a>
                          <a class="dropdown-item" href="photo_home.html#">Stop following</a>
                          <a class="dropdown-item" href="photo_home.html#">Report</a>
                        </div>
                      </div><!--/ dropdown -->
                      <!-- END dropdown-->
                      <div class="media m-0">
                        <div class="d-flex mr-3">
                          <a href="/profile_index/{{$image['rollno']}}">
                            <img class="img-responsive img-circle" src="img/users/2.jpg" alt="User">
                          </a>
                        </div>
                        <div class="media-body">
                          <a href="/profile_index/{{$image['rollno']}}">
                            <p class="m-0">{{$name[0]['name']}}</p>
                          </a>
                          <small><span>{{$image['created_at']->diffForHumans() }}</span></small>
                        </div>
                      </div><!--/ media -->
                    </div>

                    <div class="cardbox-item">
                      
                      <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0 " src="{{$image['pic']}}" 
                      id="{{$image['pic']}}"  data-toggle="tooltip" data-placement="top" title="Click the image!" style="cursor: pointer; width: 100%;height: 500px;">
                    </div><!--/ cardbox-item -->
                            
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
  <script>            
      $('#viewbucket').removeClass('p-2 nav-icon-lg dark-black');
      $('#viewbucket').addClass('p-2 nav-icon-lg mint-green');            
  </script>

  </body>
</html>