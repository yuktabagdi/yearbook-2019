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
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    
    <!-- ==============================================
    Favicons
    =============================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="../../css/animate.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"> --}}

    
      <!-- ==============================================
    CSS
    =============================================== -->
    <link type="text/css" href="{{ asset('/css/demos/photo.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('/css/demos/testimonial.css') }}" rel="stylesheet" />

    {{-- <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <!-- ==============================================
    Feauture Detection
    =============================================== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  
    
    <style>
    .cover-img{
      background-image: url('../img/bg/1.jpeg');
      height:30vw;
      background-size: 100% 100%;
      background-repeat: no-repeat;

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
              @if(!empty($data[0]['thumbnail']))
              <img class="img-fluid img-circle imghover" style="border-width: 2px;cursor: pointer" src="{{asset('/').$data[0]['thumbnail']}}" alt="Image" >
              @else
              <img class="img-fluid img-circle imghover" style="border-width: 2px;cursor: pointer" src="{{ asset('/index.png') }}" alt="Image">
              @endif
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
               <h4>{{$data[0]['name']}} <i class="fa fa-check"></i></h4>
               @if(!empty($data[0]['view_self']))
               <p class="mb-3">"{{$data[0]['view_self']}}"</p>
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
      <h5><?php echo $data[0]['rollno']; ?></h5>
    </div>
    <div class="col-sm-3 col-xs-6" align="center">
      <h4 style="font-weight:bolder">Hall</h4>
      <h5><?php echo $data[0]['HOR']; ?></h5>
    </div>
    <div class="col-sm-3 col-xs-6" align="center">

      <h4 style="font-weight:bolder">Email</h4>
      <h5>
        <?php 
        if ($data[0]['email']) {
          echo $data[0]['email'];
        }else{
          echo "No Email Provided";
        }
        ?></h5>
      </div>

      <div class="col-sm-3 col-xs-6" align="center">
        <h4 style="font-weight:bolder">Department</h4>
        <h5>
          <?php 
          if ($data[0]['department']) {
            echo $data[0]['department'];
          }else{
            echo "No Data";
          }
          ?></h5>
        </div>

      </div>
    </div>
  </div>


</div>
</section>

<section class="page-section cta" style="padding-bottom: 20px;">
  <div class="container">
    <div class="row">
      <div class="col-xl-13 mx-auto">
        <div class="cta-inner text-center rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper"></span>
            <span class="section-heading-lower">
              <div class="well well-sm" align="center" style="background-color: rgba(67,100,107,0); border:none">
                <div>
                  {{-- <p style="text-align: center;">Write for a friend!</p> --}}
                  <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Write Testimonial</a>
                </div>

                <div class="row" id="post-review-box" style="display:none;">
                  <div class="col-md-12">
                    <form action="{{ url('/writetestimony/'.$data[0]["rollno"]) }}" onSubmit="alert('Your views will be added in his yearbook after his registration and approval');" method="POST" style="padding-top: 0;">
                      {{csrf_field()}}
                      <input id="ratings-hidden" name="rating" type="hidden"> 
                      <textarea class="form-control animated" cols="50" id="new-review" name="viewf" placeholder="Enter your review here...(max 144 character)" rows="5" maxlength="144" ></textarea>
                      <br>
                      <div class="text-right">
                        <a class="btn btn-danger btn-md" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                          Cancel</a>
                          <button class="btn btn-success btn-md" type="submit">Submit</button>
                        </div>
                      </form>

                    </div>
                  </div></div></span>
                </h2>
                <p class="mb-0" style="color: #fff; font-size: 15px;"> Here’s what your friends written about you! Your testimonials are displayed below. You can approve or disapprove them by selecting the option shown beside each testimonial. The approved ones shall be a part of your yearbook.</p>
                <br>

                <ul id="tabs-swipe-demo" class="nav nav-tabs nav-justified">
                  <li class="nav-item"><a data-toggle="tab" class="nav-link" id="default" href="#testimonial">Testimonial</a></li>
                  <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#gallery">Gallery</a></li>
                  <li class="nav-item"><a data-toggle="tab" class="nav-link" href="#articles">Articles</a></li>
                </ul>
                <br>
                <div class="tab-content">
                  <div id="testimonial" class="container tab-pane active">

                    <?php
                    if(count($myviews)){
                    $l=0;
                    echo'
                    <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                    <div class="main-timeline">';
                    
                    foreach($myviews as $view)
                    {
                      $pic = App\User::where('name', $view['user'])->pluck('pro_pic');
                      $writtenBy = App\User::where('name', $view['user'])->value('rollno');
                      $writtenFor = App\User::where('rollno', $view['depmate'])->value('name');
                      if($view['approval']=='1'){

                        if($l==0)
                        {
                         echo ' <div class="timeline">
                        <span class="timeline-icon"></span>
                        <span class="year"><a href="'.url('/profile_index/'.$writtenBy) .'">'.$view['user'].'</span></a>
                        <div class="timeline-content media_body">
                        <a href="'.url('/profile_index/'.$writtenBy) .'">
                         <div align="center"><img src="/'.$pic[0].'" alt="" class="img-responsive img-circle" style="width: 60px; height: 60px;"></div>
                         <p><b style="color: #000">'.$view['user'].'</b></a> wrote for <b>'.$writtenFor.': </b></p>
                         <p>"'.$view['views'].'"</p>
                        <h6>'.$view->created_at->diffForHumans().'</h6>
                        </div>
                        </div>';
                         $l=1;
                       }
                       else{
                        echo'

                        <div class="timeline">
                        <span class="timeline-icon"></span>
                        <span class="year"><a href="'.url('/profile_index/'.$writtenBy) .'">'.$view['user'].'</span></a>
                        <div class="timeline-content media_body">
                        <a href="'.url('/profile_index/'.$writtenBy) .'">
                         <div align="center"><img src="/'.$pic[0].'" alt="" class="img-responsive img-circle" style="width: 60px; height: 60px;"></div>
                         <p><b style="color: #000">'.$view['user'].'</b></a> wrote for <b>'.$writtenFor.': </b></p>
                         <p>"'.$view['views'].'"</p>
                        <h6>'.$view->created_at->diffForHumans().'</h6>
                        </div>
                        </div>';
                        $l=0;
                      }

                    }
                  }
                  echo '
                  </div>
                  </div>
                  </div>
                  </div>
                  ';
                }
                  else{
                    echo
                  '<section class="page-section cta" style="background-color: rgba(76,71,97,0.55);">
                    <div class="container" style="margin-top: 20px; font-family: "Varela Round", sans-serif;">
                      <div class="row">
                        <div class="col-xl-9 mx-auto">
                          <div class="cta-inner text-center rounded">
                            <h2 class="section-heading mb-4">
                              <span class="section-heading-upper"></span>
                              <span class="section-heading-lower" style="color: #000">Nothing to show yet!</span>
                            </h2><br>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>';}
                  ?>

                </div>
                <div id="gallery" class="tab-pane fade">
                 <section class="newsfeed">
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
                          <img class="product-item-img mx-auto d-flex rounded img-fluid mb-3 mb-lg-0" src="{{asset('/'.$image['url'])}}" id="{{$image['id']}}"  data-toggle="tooltip" data-placement="top" title="Click the image!" style="cursor: pointer;width: 360px;height: 400px;border-radius: 10px;" >
                          <div class="explore-top" style="position: relative;top:-400px;">
                            @php
                            $likes = DB::table('likes')->where('pic_id', $image['id'])->count();
                            @endphp
                            <div class="explore-like" style="position: absolute; left: 0"><i class="fa fa-heart"></i> <span>{{$likes}}</span></div>
                          </div>      
                        </div>
                      </div>
                    </section>
                    @endif
                    @endforeach

                    {{ $images->links('vendor.pagination.bootstrap-4')}}

                    @else

                    <section class="page-section cta" style="background-color: rgba(76,71,97,0.55);">
                      <div class="container" style="margin-top: 20px; font-family: 'Varela Round', sans-serif;">
                        <div class="row">
                          <div class="col-xl-9 mx-auto">
                            <div class="cta-inner text-center rounded">
                              <h2 class="section-heading mb-4">
                                <span class="section-heading-upper"></span>
                                <span class="section-heading-lower" style="color: #000">Nothing to show yet!</span>
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
              </section>
            </div>
            <div id="articles" class="tab-pane fade">
              @if(count($writeups)>0)
             @foreach($writeups as $writeup)
             <div class="article" style="padding-top:2vw;padding-right: 6vw;padding-left:2vw;">

              <h2 class="section-heading mb-4 text-center">
                <a href="/writeup/{{ $writeup->id }}"><i style="float: right;color: black;font-size: 30px" class="material-icons">delete</i></a>
                <span class="section-heading-lower">{{ $writeup->topic }} </span>

              </h2>

              <p style="padding: 2vw;text-align: left;" title="Click to edit!" data-value="{{csrf_token()}}" onblur="update({{ $writeup->id }})" id="{{ $writeup->id }}" contenteditable >{!!  nl2br($writeup->writeup)!!}</p>
            </div>
            @endforeach
            @else
            <section class="page-section cta">
              <div class="container"  style="margin-top: 20px; font-family: 'Varela Round', sans-serif;">
                <div class="row">
                  <div class="col-xl-9 mx-auto">
                    <div class="cta-inner text-center rounded">
                      <h2 class="section-heading mb-4">
                        <span class="section-heading-upper"></span>
                        <span class="section-heading-lower" style="color: #000">Nothing to show yet!</span>
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
    </div>

  </div>

</section>
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
            <img class="img-responsive img-circle" id="image" src="" />
            <strong><span style="font-size: 14px;" id="posted_by"></span></strong>
          </a>
        <span id="created_at"></span><br/>
      </div><!--/ img-poster -->
      <div id="comments"> 
      </div>

      <div class="modal-meta-bottom">     
        <span class="thumb-xs">
          @if(!empty($data[0]['pro_pic']))
          <img class="img-fluid img-circle" src="{{Auth::user()->thumbnail}}" style="width: 35px; height: 35px;" alt="Image">
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
<footer class="footer text-faded text-center py-5" style=" color: #fff;background-color: grey;">
  <div class="container">
    <p class="m-0 small">Copyright &copy; Yearbook 2019</p>
    <p class="m-0 small"><a target="_blank" href="{{ url('http://www.sac.iitkgp.ac.in/team.php') }}">Contact Us</a></p>
  </div>
</footer>
     <!-- ==============================================
   Scripts
   =============================================== -->
   <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('/js/base.js') }}"></script>
   <script src="{{ asset('/plugins/slimscroll/jquery.slimscroll.js') }}"></script>
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

  $(document).ready(function() {
     var src = $('.pro_pic').attr("src");
     $('.pro_pic').attr("src", '../' + src);
  });
  function call($id)
  {
    alert($id);
  }
  
  function update(id){
    var writeupedit=$("#"+id).text();
  //console.log(writeupedit);
  $.ajax({
    type: "POST",
    url:' {{ URL::to("/updates") }} ',
    data: {
      writeup: writeupedit,
      id:id,
      _token: $("#"+id).attr('data-value'),
    }
  });
}

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
            document.getElementById('image').src = '../' + image['pic'];
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
</script>
<script type="text/javascript">
  (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

  var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

  $(function(){

    $('#new-review').autosize({append: "\n"});

    var reviewBox = $('#post-review-box');
    var newReview = $('#new-review');
    var openReviewBtn = $('#open-review-box');
    var closeReviewBtn = $('#close-review-box');
    var ratingsField = $('#ratings-hidden');

    openReviewBtn.click(function(e)
    {
      reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
      openReviewBtn.fadeOut(100);
      closeReviewBtn.show();
    });

    closeReviewBtn.click(function(e)
    {
      e.preventDefault();
      reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
      closeReviewBtn.hide();
      
    });

    $('.starrr').on('starrr:change', function(e, value){
      ratingsField.val(value);
    });
  });
</script>