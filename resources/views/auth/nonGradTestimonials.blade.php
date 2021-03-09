<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Yearbook</title>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link href="{{ url('https://fonts.googleapis.com/icon?family=Material+Icons') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href="{{ url('https://fonts.googleapis.com/css?family=Raleway:300') }}">

      <link rel="stylesheet" href="{{ asset('css/style1.css') }}">


</head>

<body>

   <div class="container-fluid">




  <h1><small>

   <h3 class="center main-title animated zoomIn">
    <div class="clock-wrap">
  <div class="clock">
    <div class="clock__date">
    </div>
    <div class="clock__time">
    </div>
  </div>
</div>
<div class="clock-toogle">
  <div class="clock-toogle__toogle"></div>
</div>
<br>
Enter Testimonials for<b> 2021 Graduating Batch </b>here! </h3><br>

    <!-- <form method ="post" action="{{ url('/writepublic') }}" onsubmit="alert('hi')">
      <input type="text" name="req_roll" placeholder="Enter roll no here">
      <textarea name="viewx" cols="50" placeholder="Enter your review here...(max 144 character)" rows="5" maxlength="144" >
      </textarea>
      <button type="submit">Submit</button>
    </form> -->
   <form method="post" class="form main-title center" action="nonGradTestimonials">

                {{ csrf_field() }}
                <div class="row" style="margin-bottom: 0px; text-align : center">

                    <div class='row'>
                      <div class="input-field col-sm-6" >
                        <input name="name" id="name" autofocus placeholder="Name" type="text" style="margin-top: 5px;" required>
                        <label for="name"><h5 style="font-size: 140%;  color: #004d33;">Name </h5></label>
                    </div>
                    <div class="input-field col-sm-6" >
                        <input name="rollno" id="rollno" autofocus placeholder="Roll Number" type="text" style="margin-top: 5px;" required>
                        <label for="rollno"><h5 style="font-size: 140%;  color: #004d33;">Roll Number (16THXXXXX)</h5></label>
                    </div>
                  </div>

                    <div class="input-field col-sm-12 ">
                        <input name="testimonial-non-grad" id="testinomial-non-grad" placeholder="Testimonials" type="text" style="margin-top: 5px;" required>
                        <label for="testinomial-non-grad"><h5 style="font-size: 140%; color: #004d33;">Testimonial</h5></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 l4 m12 offset-l4">
                        <button type="submit" id="submit" name="submit" class="waves-effect waves-light btn" style="font-size: 15px;" required >Submit</button>
                    </div>
                </div>
            </form>

            <p class=" center sub-title main-title" >Contact us at:<br> <a href="mailto:iitkgpyearbook2020@gmail.com"> iitkgpyearbook2020@gmail.com<a><i class="material-icons">error_outline</i><span class="tooltip">If you are not graduating this year, but want to write about your friends who are graduating, send us the testimonials via mail at iitkgpyearbook2020@gmail.com</span></a></p>

            </small></h1>
  </div>

<!-- You can add more ".slideshow-image" elements, but remember to update the "$items" variable on SCSS -->
<!-- <div class="slideshow">
  <div class="slideshow-image" style="background-image: url('21.jpeg')"></div>
  <div class="slideshow-image" style="background-image: url('12.jpg')"></div>
  <div class="slideshow-image" style="background-image: url('2.jpg')"></div>
  <div class="slideshow-image" style="background-image: url('50.jpg')"></div>
</div> -->




</body>

</html>
