<!DOCTYPE html>
<html lang="en">
  <head>

      <!-- ==============================================
    Title and Meta Tags
    =============================================== -->
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{Auth::user()->name}}-Dashboard</title>
    <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta property="og:title" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />   
    
    <!-- ==============================================
    Favicons
    =============================================== --> 
    <link rel="icon" href="img/logo.jpg">
    <link rel="apple-touch-icon" href="img/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicons/apple-touch-icon-114x114.png">
     <link rel="stylesheet" href="css/cropper.css" />
  <script src="js/cropper.js"></script>
      <!-- ==============================================
    CSS
    =============================================== -->
        <link type="text/css" href="css/demos/photo.css" rel="stylesheet" />
        
    <!-- ==============================================
    Feauture Detection
    =============================================== -->
    <script src="js/modernizr-custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>-->
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!--[endif]-->  
    <script  src="https://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.7.0/introjs.css">
<script src="js/canvas-to-blob.min.js"></script>


    <style>

.tablink {
    background-color: #fff;
    color: #000;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 50%;
}

.tablink:hover {
    background-color: #777;
    color:white;
}

.tablink:active {
    color:white;
}

.tabcontent {
    
    display: none;
    padding: 100px 20px;
    height: 100%;
}

.cover-img{
  background-image: url('img/bg/1.jpeg');
  height:35vw;

}
.back{
  background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg');
  background-attachment: fixed;
}
</style>
  </head>

<body>

     <!-- ==============================================
     Navigation Section
     =============================================== -->  
  @include('navbar')
   <!-- ==============================================
   News Feed Section
   =============================================== --> 
   <section class="profile">
    <div class="container-fluid cover-img">

    </div><!--/ container -->
   </section><!--/ profile -->
   <!-- ==============================================
   User Profile Section
   =============================================== --> 
   <div class="back">
   <section class="user-profile">
    <div class="container-fluid">
     <div class="row">
     
      <div class="col-lg-12">
       <div class="post-content">
          <div class="author-post text-center">
            <div>
                  @if(!empty(Auth::user()->pro_pic))
                  <img class="img-fluid img-circle" src="{{Auth::user()->pro_pic}}" alt="Image"  data-toggle="modal" data-target="#modal2" data-step="1" data-intro="<center> Upload your profile picture and write a caption here </center> "  >
          
                  @endif
                  

                </div>
          </div><!-- /author -->
       </div><!-- /.post-content -->    
    </div><!-- /col-sm-12 -->
    
       </div><!--/ row--> 
    </div><!--/ container -->
   </section><!--/ profile -->
  <div id="modal2" class="modal fade" role="dialog">

      <div class="modal-dialog">



        <!-- Modal content-->

        <div class="modal-content" style="text-align: center;">

          <div class="modal-header">



            <h4 class="modal-title" style="color: white;">Upload Picture and Caption</h4>

            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>

          <div class="modal-body">

            <form action="/upload_pic_moto" method="post" enctype="multipart/form-data">

              {{csrf_field()}}

              @if (count($errors) > 0)

              <script type="text/javascript">

                alert('<?php foreach($errors->all() as $error) { echo "$error"; } ?>');

              </script>

              @endif

              <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;" onchange="readURL(this);">

              <img src="<?php if (!empty(Auth::user()->pro_pic)){echo Auth::user()->pro_pic; } else { echo 'img/bg.jpg';}?>" alt="abc" class="intro-img img-fluid mb-3 mb-lg-0 rounded" id="OpenImgUpload" style="cursor: pointer;width: 180px;height: 180px;">

              <div class="input-field col sm-12 lg-12 md-12">

                <div class="form-group">

                  <label for="comment">Caption (Max 50 characters)</label>
                  @if(!empty(Auth::user()->view_self))
                  <textarea name="motto" id="icon_prefix2" class="form-control" placeholder="Enter Your Caption Here (Max 50 characters)" style="text-align: center;color: black;" maxlength="50" rows="2" id="comment">{{Auth::user()->view_self}}</textarea>
                  @else
                  <textarea name="motto" id="icon_prefix2" class="form-control" placeholder="Enter Your Caption Here (Max 50 characters)" style="text-align: center;color: black;" maxlength="50" rows="2" id="comment"></textarea>
                  @endif


                </div>



              </div>

              <input type="submit" name="save" value="Save" class="waves-effect waves-light btn" style="width: 150px;" id="imgsave">

            </form>

          </div>

        </div>



      </div>

    </div>




   <!-- ==============================================
   User Profile Section
   =============================================== --> 
   <section class="details">
    <div class="container">
     <div class="row">
      <div class="col-lg-12">
     
          <div class="details-box row">
           <div class="content-box">
            <center>
         <h4>{{Auth::user()->name}} <i class="fa fa-check"></i></h4>
             @if(!empty(Auth::user()->view_self))
             <p class="mb-3">"{{Auth::user()->view_self}}"</p>
             @else
             <p class="mb-3">"Your Caption Here!"</p>
             @endif
             </center>
           </div><!--/ media -->
       
          </div><!--/ details-box -->
      
    </div>
     </div>
    </div><!--/ container -->
   </section><!--/ profile -->

  







   <!-- ==============================================
   News Feed Section
   =============================================== --> 
   <section class="newsfeed">
    
        <div class="tab_bar" style="margin-left: 26%;align-items: center;
          margin-right: 26%">
        <button class="tablink kafe-btn" onclick="openPage('Articles', this, '#0fc19e','white')" id="defaultOpen">Articles</button>
      <button class="tablink kafe-btn" onclick="openPage('Gallery', this, '#0fc19e','white')">Gallery</button>
      </div>
    <div class="container">
      <div id="Articles" class="tabcontent">
      
        
        <div width="50vw">
        <p>
         @include('writeup2')
       </p>
     </div>
      </div>
    <div id="Gallery" class="tabcontent">
    
      <div class="row">
      <div class="col-lg-12">  
    
       <div class="box" style="border-radius: 3px;font-color:#88898a">
      <form id="upload-image-form" action="/upload1" method="post" enctype="multipart/form-data">
           <input id="signup-token" type="hidden" name="_token" value="{{ csrf_token() }}">
       
       <div class="form-group">
                <label for="classifiers" style="margin-left:40%;margin-top:1%" ><h5 style="color:#88898a"><b>Select Category: (Max size: 5MB)</b></h5></label>
                <select class="form-control" name="classifier"  style="margin-left:40%;width:auto">
                  <option value="dep">DEPARTMENT PHOTOS</option>
                  <option value="hall">HALL PHOTOS</option>
                  <option value="fest">FEST PHOTOS</option>
                  <option value="misc">OTHER MOMENTS AT KGP</option>
                </select>
              </div>
      
      <div id="cropp-image-div">
                <img id="crop-image" style="margin-left: 41%" src="" class="img-thumbnail">
          </div>
        <div class="form-group">
          <label for="caption" style="margin-left:48%"><h5 style="color:#88898a"><b>Caption:</b></h5></label>
          <textarea class="form-control no-border" rows="2" cols="15" placeholder="Type something..." name="caption" id="caption" required="required"></textarea>
        </div> 
          
      <div class="box-footer clearfix">
       <button class="kafe-btn kafe-btn-mint-small pull-right btn-sm" id="upload-button" type="submit" disabled>Upload image</button>

       <ul class="nav nav-pills nav-sm">
      <li class="nav-item">
        <div class="image-upload">
            <label for="image">
                <a class="nav-link" ><i class="fa fa-camera text-muted"></i></a>
            </label>

            <input style="display: none;" type="file" name="image" id="image" accept="image/*" required/>
        </div>
      </li>
       </ul>
      </div>
     </div> 
     </form>
     <br>
            <div class="alert alert-info" id="loading" style="display: none;" role="alert">
              Uploading image...
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                </div>
              </div>
            </div>
    </div>
     </div>

     <div class="container">
        <div class="row">

        @if(count($images)>0)
          {{ $images->links('vendor.pagination.bootstrap-4')}}
          @php
          $count= 0;
          @endphp

          @foreach($images as $image)
          @if(file_exists($image['url']))
          <section class="page-section">
            
                   
            <div class="col-lg-4">
             <div class="explorebox" style="border-radius: 10px;">
              <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{$image['url']}}" id="{{$image['id']}}"  data-toggle="tooltip" data-placement="top" title="Click the image!" style="cursor: pointer;width: 360px;height: 400px;border-radius: 10px;" >
              <div class="explore-top" style="position: relative;top:-400px; ">
                @php
                $likes = DB::table('likes')->where('pic_id', $image['id'])->count();
                @endphp
               <div class="explore-like"><i class="fa fa-heart"></i> <span>{{$likes}}</span></div>
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
        </div>  
    </div>
     
   </section><!--/ newsfeed -->
     
    </div><!--/ container -->
   
   </section><!--/ newsfeed -->
  



   <!-- ==============================================
   Modal Section
   =============================================== -->
   <div id="bootstrap-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Selected image : </h4>
        </div>
        <div class="modal-body">
         <div id="image-preview-div" style="display: none">
          <center><img id="preview-img" src=""></center>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>
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
          <a href="#" id="profile">
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
  <script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
document.getElementById("defaultOpen").click();
</script>
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
<script type="text/javascript">

            /*

              This script is used to check if the profile pic and caption is uplaoded or not

              If not then triggers the modal to upload the pic and caption

              */

              var back = "<?php if (!empty(Auth::user()->view_self)) echo 1;else echo 0; ?>" ;

              var back2 = "<?php echo Auth::user()->pro_pic; ?>" ;

              $(document).ready(function() {

                $('#modal2').modal('hide');

                if ( (!back)||!(back2) ) {

                  $("#modal2").modal('show');

                } else {

                }



              });
              $('#photo').click(function(){

                $('#photo').submit();

              });

              



              $('#OpenImgUpload').click(function(){ $('#fileToUpload').trigger('click'); });

              function readURL(input) {



                if (input.files && input.files[0]) {

                  var reader = new FileReader();



                  reader.onload = function (e) {

                    $('#OpenImgUpload')

                    .attr('src', e.target.result)

                  };



                  reader.readAsDataURL(input.files[0]);

                }

              }

            </script>
<script type="text/javascript">
 /*jslint browser: true, white: true, eqeq: true, plusplus: true, sloppy: true, vars: true*/
 /*global $, console, alert, FormData, FileReader*/
 function selectImage(e) {
  $('#file').css("color", "green");
  console.log("selectImage called"); 
  $('#bootstrap-modal').modal('show');
  $("#bootstrap-modal").on("shown.bs.modal", function() {
    $('#image-preview-div').css("display", "block");
    $('#preview-img').attr('src', e.target.result);
    $('#preview-img').css('width', '450px');
     // console.log("modal opened");
   }).on("hidden.bs.modal", function() {
      originalData = $("#preview-img")
    
      //console.log(originalData);
      
      $('#cropp-image-div').css("display", "block");
      $('#crop-image').attr('src', e.target.result);
      $('#crop-image').css('max-width', '200px');
    });
 }
 $(document).ready(function (e) {
  $('form#upload-image-form').on('submit', function(e) {
    e.preventDefault();
    $('#message').empty();
    $('#loading').show();
      //console.log(originalData);
      var formdata = new FormData(this); 
      
     //console.log("crop image",originalData);
     $.ajax({
      url: "/upload1",
      type: "POST",
      data: formdata,
      contentType: false,
      cache: false,
      processData: false,
      success: function(response)
      {
        alert('Your pic has been succesfully added.');
        $('#loading').hide();
        $('#cropp-image-div').css("display", "none");
        var $el = $('#image');
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
        console.log(response);
       // document.getElementById('posts').innerHTML += response;
       location.reload();
     },
     error: function(data)
     {
      alert("Sorry, there was an error uploading image");
      console.log("error",data);
      window.location.reload();
    }
  });
   });
  $('#image').change(function() {
    $('#upload-button').removeAttr("disabled");
    var reader = new FileReader();
    reader.onload = selectImage;
    reader.readAsDataURL(this.files[0]);
  });
});
</script>
</body>
</html>
<script>
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