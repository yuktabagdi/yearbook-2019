<!DOCTYPE html>
<html lang="en">
<head>

      <!-- ==============================================
    Title and Meta Tags
    =============================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="" />
    <meta property="og:description" content="" />   
    
    <!-- ==============================================
    Favicons
    =============================================== --> 
    <link rel="icon" href="http://themashabrand.com/templates/Fluffs/assets/img/logo.jpg">
    <link rel="apple-touch-icon" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon-114x114.png">
    
      <!-- ==============================================
    CSS
    =============================================== -->
    <link type="text/css" href="css/demos/photo.css" rel="stylesheet" />
    
    <!-- ==============================================
    Feauture Detection
    =============================================== -->
    <script src="http://themashabrand.com/templates/Fluffs/assets/js/modernizr-custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
    
    <style>
    .cover-img{
      background-image: url('img/about.jpg');
      height:35vw;

    }
    .back{
      background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg');
      background-attachment: fixed;
    }
    @media (min-width: 768px) { 
      .details-box{
        margin-right: -120px;
      }
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
   <section class="nav-sec">
    <div class="d-flex justify-content-between">
      <div class="p-2 nav-icon-lg dark-black">
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
      <div class="p-2 nav-icon-lg mint-green">
        <a class="nav-icon" href="photo_profile.html"><em class="fa fa-user"></em>
          <span>Profile</span>
        </a>
      </div>
    </div>
  </section> 

   <!-- ==============================================
   News Feed Section
   =============================================== --> 
   <div class="back">
     <section class="profile">
      <div class="container-fluid cover-img">
      </div><!--/ container -->
    </section><!--/ profile -->
    <section class="user-profile">
      <div class="container-fluid">
       <div class="row">

        <div class="col-lg-12">
         <div class="post-content">
          <div class="author-post text-center">
            <div>
              <img class="img-fluid img-circle" src="<?php if (!empty(Auth::user()->pro_pic)){echo Auth::user()->pro_pic; } else { echo 'img/shot.jpg';}?>" alt="" id="OpenImgUpload" style="cursor: pointer;">
            </div>
          </div><!-- /author -->
        </div><!-- /.post-content -->    
      </div><!-- /col-sm-12 -->

    </div><!--/ row--> 
  </div><!--/ container -->
</section><!--/ profile -->
<section class="notifications back">
  <div class="container">
    <div class="bg-faded rounded p-5">

      <section class="details">
        <div class="container">
         <div class="row">
          <div class="col-sm-4 col-sm-offset-3">

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
       
      <div class="col-lg-9 col-lg-offset-1">
        <div class="row" style=" color: #fff;background-color: black;opacity: 0.6;padding: 10px;">
          <div class="col-sm-3 col-xs-6" align="center">
            <h4 style="font-weight:bolder" >Roll No.</h4>
            <h5><?php echo Auth::user()->rollno; ?></h5>
          </div>
          <div class="col-sm-3 col-xs-6" align="center">
            <h4 style="font-weight:bolder">Hall</h4>
            <h5><?php echo Auth::user()->HOR; ?></h5>
          </div>
          <div class="col-sm-3 col-xs-6" align="center">

            <h4 style="font-weight:bolder">Email</h4>
            <h5>
              <?php 
              if (Auth::user()->email) {
                echo Auth::user()->email;
              }else{
                echo "No Email Provided";
              }
              ?></h5>
            </div>

            <div class="col-sm-3 col-xs-6" align="center">
              <h4 style="font-weight:bolder">Department</h4>
              <h5>
                <?php 
                if (Auth::user()->department) {
                  echo Auth::user()->department;
                }else{
                  echo "No Data";
                }
                ?></h5>
              </div>

            </div>
          </div>
        </div>
        
        <div class="col-lg-9 col-lg-offset-1">
          <div class="row" style="margin-top: 30px;">
            <ul>
              <?php

              $dept = Auth::user()->department;
              $rollno = Auth::user()->rollno;
              $j=0;
              $i=0;

              foreach($myviews as $view)
              {
                $id=$view['id'];
                $pic = App\User::where('name', $view['user'])->pluck('pro_pic');
                echo '<li>
                <div class="media first_child" style="margin-left: -17px; opacity: 0.96"> 
                <img src="'.$pic[0].'" alt="" class="img-responsive img-circle">  
                <div class="media_body">
                <p><b>'.$view['user'].'</b> wrote for you: </p>
                <p>"'.$view['views'].'"</p>
                <h6>'.$view->created_at->diffForHumans().'</h6>
                <div class="btn_group" id="'.$id.'">'; 
                if($view['approval']=='1'){

                  echo '<button type="button" class="btn btn-danger disapprove app'.$i.'"  data-no="'.$i.'" data-id="'.json_encode($id).'" id= "'.json_encode($rollno).'" >Disapprove</button>';
                }else{


                  echo '<button type="button" class="btn btn-success approve app'.$i.'"  data-no="'.json_encode($i).'" data-id="'.json_encode($id).'" id= "'.json_encode($rollno).'" );" >Approve</button> <div class="text_show'.$i.'" style= "padding-left: 15px;"></div>';
                }

                echo '</div></div></div></li>';

                $j=1;
              }         
              if($j==0)
              {

                echo '<div style="text-align: center; font-family: Aclonica"><h3 style="color: #fff;">No Testimonials Given!</h3></div>';
              }
              ?>

            </ul>

          </div>

        </div><!--/ row-->  
      </div><!--/ container -->
    </section><!--/ profile -->
  </div>
  <footer class="footer text-faded text-center py-5" style=" color: #fff;background-color: grey;">
  <div class="container">
    <p class="m-0 small">Copyright &copy; Yearbook 2018</p>
    <p class="m-0 small"><a target="_blank" href="http://www.sac.iitkgp.ac.in/team.php">Contact Us</a></p>
  </div>
</footer>
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

</body>
</html>
<script type="text/javascript">

  function call($id)
  {
    alert($id);
  }
  $('#OpenImgUpload').click(function() {
    window.location = "/homenew";
  });
  $('.approve').click('.approve', function(){


    var rollno = $(this).attr('id');
    var no = $(this).attr('data-no');
    var id = $(this).attr('data-id');
    var query= id;

    $.ajax({
      url: "/approve/"+id,
      type: "GET",
      data: {'id': id, 'i': no, 'rollno': rollno,},

      success: function(response)
      {

        document.getElementById(id).innerHTML = response;
      },
      error: function(data)
      {

      }
    });

  }); 
  $('.disapprove').click('.disapprove',function(){

    var rollno = $(this).attr('id');
    var no = $(this).attr('data-no');
    var id = $(this).attr('data-id');

    var query= '1';

    $.ajax({
      url: "/disapprove/"+id,
      type: "GET",
      data: {'id': id, 'i': no, 'rollno': rollno,},

      success: function(response)
      {

        document.getElementById(id).innerHTML = response;
      },
      error: function(data)
      {

      }
    });
  }); 


</script>