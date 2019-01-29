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

  <link type="text/css" href="{{ asset('css/demos/photo.css') }}" rel="stylesheet" />
  <link type="text/css" href="{{ asset('css/demos/interest.css') }}" rel="stylesheet" />
  <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/business-casual.min.css') }}" rel="stylesheet">

  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style type="text/css">
  .back{
    background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg');
    background-attachment: fixed;
  }
  .cover-img{
    background-image: url('/img/a.jpg');
    background-size: 100% 100%;
    height:35vw;

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
            <img class="img-fluid img-circle" src="<?php if (!empty(Auth::user()->pro_pic)){echo '/'.Auth::user()->pro_pic; } else { echo '/ind/shot.jpg';}?>" alt="" id="OpenImgUpload" style="cursor: pointer;">
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

          <form class="form" method="POST" action="'/details'">
            {{csrf_field()}}
            @if (count($errors) > 0)

            <script type="text/javascript">

              alert('<?php foreach($errors->all() as $error) { echo "$error"; } ?>');

            </script>

            @endif
            <div class="row">
              <div class="col-sm-4">
                <label for="department">Department</label>
                <select name="department"  id="department" required class="form-control">
                  <option selected value="{{Auth::user()->department}}">@php
                  if(!empty(Auth::user()->department))
                  {
                    echo Auth::user()->department;
                  }
                  else
                  {
                    echo 'Choose your department';
                  }
                  @endphp   
                </option>
                <option value="AE">AE</option>
                <option value="AG">AG</option>
                <option value="AR">AR</option>
                <option value="AT">AT</option>
                <option value="BM">BM</option>
                <option value="BT">BT</option>
                <option value="CE">CE</option>
                <option value="CH">CH</option>
                <option value="CL">CL</option>
                <option value="CR">CR</option>
                <option value="CS">CS</option>
                <option value="CY">CY</option>
                <option value="EC">EC</option>
                <option value="EE">EE</option>
                <option value="ET">ET</option>
                <option value="GG">GG</option>
                <option value="GS">GS</option>
                <option value="HS">HS</option>
                <option value="ID">ID</option>
                <option value="IM">IM</option>
                <option value="IP">IP</option>
                <option value="IT">IT</option>
                <option value="MA">MA</option>
                <option value="ME">ME</option>
                <option value="MI">MI</option> 
                <option value="MM">MM</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="NA">NA</option>
                <option value="PH">PH</option>
                <option value="RD">RD</option>
                <option value="RE">RE</option>
                <option value="RJ">RJ</option>
                <option value="RT">RT</option>
                <option value="TS">TS</option>
                <option value="WM">WM</option>
              </select>
            </div>
            <div class="col-sm-4">
              <label for="HOR">Hall of Residence</label>
              <select name="HOR"  id="HOR" required class="form-control">
                <option selected value="{{Auth::user()->HOR}}">@php
                if(!empty(Auth::user()->HOR)) 
                {
                  echo Auth::user()->HOR;
                }
                else
                {
                  echo 'Choose your HALL';
                }
                @endphp 
              </option>
              <option value="SAM"> Ashutosh Mukherjee Hall </option>
              <option value="AZ"> Azad Hall </option>
              <option value="BCR"> B C Roy Hall </option>
              <option value="BRH"> B R Ambedkar Hall </option>
              <option value="GKH"> Gokhale Hall </option>
              <option value="HJB"> Homi Bhabha Hall </option>
              <option value="JCB"> J C Bose Hall </option>
              <option value="LLR"> Lala Lajpat Rai Hall </option>
              <option value="LBS"> Lalbahadur Sastry Hall </option>
              <option value="MMM"> Madan Mohan Malviya Hall </option>
              <option value="MS"> Megnad Saha Hall </option>
              <option value="MT"> Mother Teresa Hall </option>
              <option value="NH"> Nehru Hall </option>
              <option value="PH"> Patel Hall </option>
              <option value="RK"> Radha Krishnan Hall </option>
              <option value="RP">Rajendra Prasad Hall </option>
              <option value="RLB">Rani Laxmibai Hall </option>
              <option value="SN/IG">Sarojini Naidu/Indira Gandhi Hall</option> 
              <option value="NVH">Sister Nivedita Hall </option>
              <option value="VS">Vidyasagar Hall </option>
              <option value="VSRC">Vikram Sarabhai residential Complex </option>
              <option value="ZH">Zakir Hussain Hall </option>
              <option value="other">Other </option>
            </select>
          </div>
          <div class="col-sm-4">
            <label for="course">Course</label>
            <select name="course"  required class="form-control">
              <option selected value="{{Auth::user()->course}}">@php 
              if(!empty(Auth::user()->course))
              {
                echo Auth::user()->course;
              }
              else
              {
                echo 'Choose your COURSE';
              }
              @endphp 
            </option>
            <option value="UG">UG</option>
            <option value="PG">PG</option>
            <option value="RS">RS</option>
          </select>
        </div>
      </div>
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

      </div>
      <br>
      <div class="row">
        <div class="col text-center">
          <button class="btn btn-success" type="submit" style="cursor: pointer;">Update</button>
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
        <p class="m-0 small">Copyright &copy; Yearbook 2018</p>
        <p class="m-0 small"><a target="_blank" href="{{ url('http://www.sac.iitkgp.ac.in/team.php') }}">Contact Us</a></p>
      </div>
    </footer>
  </body>
  </html>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/base.js') }}"></script>