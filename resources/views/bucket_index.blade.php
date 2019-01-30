<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>YB | Itch List</title>

  <link href="{{ asset('/css/business-casual.min_test.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('/css/demos/photo.css') }}" rel="stylesheet" />
  <link type="text/css" href="{{ asset('/css/demos/bucketAnimation.css') }}" rel="stylesheet" />


  
  <link rel="icon" href="{{ url('http://themashabrand.com/templates/Fluffs/assets/img/logo.jpg') }}">
  
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ url('http://fonts.googleapis.com/icon?family=Material+Icons;') }}" rel="stylesheet">
  

  <style type="text/css">
  @font-face {
    font-family: 'Century gothic';
    src: url('font.ttf');
  }
  #modal1{
    overflow: hidden;
  }
  #search{
    padding-left: 0px !important;
    padding-right: 10px;
  }
  .xdsoft_autocomplete{
    margin-left: -20px;
  }

  table{
    table-layout: fixed;
  }
  .btn{
    width: 180px;
  }
  body{

    
  }
  .caption{
    margin-top: -40px;
    background-color: #26a69a;
  }
  .article{
    background-color: #ffffff;
    border-radius: 10px;
  }
  .back
  {
    background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg') !important;
    background-attachment: fixed;
  }
  #search{
    margin-left: -20  px;
  }
</style>



</head>

<body class="back">
  <!-- Navigation--> 
  @include('navbar')



  <section class="page-section" style="font-family: Century gothic;">
    <div class="container article" style="padding: 2vw">
      <div class="row">
        <div class="col-xl-12 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper"></span>
              <span class="section-heading-lower">ITCH LIST</span>
            </h2>
            <p class="mb-0">Here is a list of things which you can do before graduating. Complete the tasks and upload the images and we will make sure they become a part of your yearbook.</p>
            <br>



            <!-- that’s all folks! -->
          </div>
        </div>
      </div>

    </div>

    <br><br><br>
    <div class="container" style="padding: 2vw">
      <div class="row">
       @include('bucket.1')
     </div>

     <div class="row">
      @include('bucket.2')
    </div>

    <div class="row">
     @include('bucket.3')
   </div>

   <div class="row">
     @include('bucket.4')
   </div> 
 </div>
</section>
<footer class="footer text-faded text-center py-5">
  <div class="container">
    <p class="m-0 small">Copyright &copy; Yearbook 2019</p>
    <p class="m-0 small"><a target="_blank" href="{{ url('http://www.sac.iitkgp.ac.in/team.php') }}">Contact Us</a></p>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/base.js') }}"></script>
<script src="{{ asset('/plugins/slimscroll/jquery.slimscroll.js') }}"></script>
<script>            
    $('#fillbucket').removeClass('p-2 nav-icon-lg dark-black');
    $('#fillbucket').addClass('p-2 nav-icon-lg mint-green');            
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
</body>
</html>

<!-- this is the markup. you can change the details (your own name, your own avatar etc.) but don’t change the basic structure! -->