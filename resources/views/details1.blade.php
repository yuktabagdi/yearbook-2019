<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>YB|Details</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link type="text/css" href="css/demos/photo.css" rel="stylesheet" />
  <link type="text/css" href="css/demos/interest.css" rel="stylesheet" />
  <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style type="text/css">
  .back{
    background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg');
    background-attachment: fixed;
  }
  .cover-img{
  background-image: url('img/bg/1.jpeg');
  height:30vw;
  background-size: 100% 100%;
  background-repeat: no-repeat;

}
  
  .dropdown-menu{
    top: 60px;
    right: 0px;
    left: unset;
    width: 460px;
    box-shadow: 0px 5px 7px -1px #c1c1c1;
    padding-bottom: 0px;
    padding: 0px;
  }
  .dropdown-menu:before{
    content: "";
    position: absolute;
    top: -20px;
    right: 12px;
    border:10px solid #343A40;
    border-color: transparent transparent #343A40 transparent;
  }
  .head{
    padding:5px 15px;
    border-radius: 3px 3px 0px 0px;
  }
  .notification-box{
    padding: 10px 0px; 
  }
  .bg-gray{
    background-color: #eee;
  }
  @media (max-width: 640px) {
    .dropdown-menu{
      top: 50px;
      left: -16px;  
      width: 290px;
    } 
    .nav{
      display: block;
    }
    .nav .nav-item,.nav .nav-item a{
      padding-left: 0px;
    }
    .message{
      font-size: 13px;
    }
  }
</style>
</head>

<body class="back">

  <!-- Navigation--> 
  @include('navbar')
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
            <img class="img-fluid img-circle" src="<?php if (!empty(Auth::user()->pro_pic)){echo '/'.Auth::user()->pro_pic; } else { echo '/ind/shot.jpg';}?>" alt="" id="OpenImgUpload" style="cursor: pointer;border-width: 2px">
          </div>
        </div><!-- /author -->
      </div><!-- /.post-content -->    
    </div><!-- /col-sm-12 -->

  </div><!--/ row--> 
</div><!--/ container -->
</section><!--/ profile -->
  <section class="details">
    <div class="container">
     <div class="row" align="center">
      <div class="" style="max-width: 350px;">

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

<section class="page-section cta" style="background-color: rgba(0,0,0,0); margin-top: -20px;">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <div class="cta-inner rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper"></span>
            <span class="section-heading-lower text-center">Edit Details</span>
          </h2>

          <form class="form" method="POST" action="/details">
            {{csrf_field()}}
            @if (count($errors) > 0)

            <script type="text/javascript">

              alert('<?php foreach($errors->all() as $error) { echo "$error"; } ?>');

            </script>

            @endif
            
      <br>
      <div class="row">
        <div class="col-sm-6">
          <i class="material-icons prefix">email</i>&nbsp;
          <label for="email" style="margin-top: -10px;">Email</label>
          <input name="email" value="{{Auth::user()->email}}"  class="form-control" type="email" required >

        </div>
        <div class="col-sm-6">
          <i class="material-icons prefix">phone</i>&nbsp;
          <label for="phone">Phone no</label>
          <input name="phone" value="{{Auth::user()->phone}}" class="form-control"  type="number" size="10" required> 
        </div>
        <br>
        <br>
        <div class="col-sm-6">
          <i class="fas fa-key"></i>&nbsp;
          <label for="password">Password</label>
          <input name="password"  class="form-control" type="password" required >

        </div>


      </div>
      <br>

      <div class="row">
        <div class="col text-center">
          <a class="btn btn-success" href="/details">Update</a>
        </div>
      </div>

    </form>

  </div>
</div>
</div>

</div>
</section>

   <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; Yearbook 2019</p>
        <p class="m-0 small"><a target="_blank" href="{{ url('http://www.sac.iitkgp.ac.in/team.php'
        ) }}">Contact Us</a></p>
      </div>
    </footer>
  </body>
  </html>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/base.js') }}"></script>
