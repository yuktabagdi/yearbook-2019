<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/autocomplete.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/autocomplete.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.nav-icon-lg
	{
		width: 20% !important;
	}
</style>
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
				<a class="navbar-brand" href="https://sac.iitkgp.ac.in/index.php"><img src="{{ asset('img/navbar/SACLogo.png') }}" width="150px" height="75px" style="margin-top:-23px;" /></a>
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
							<form action="{{ url('/search') }}" method="POST" class="form-inline">
								{{ csrf_field() }}
								<input placeholder=" Search Your Friend Here..." type="text" name="search" required="required" id="search" style="background: none; border: none; padding-top: 3px; padding-left: 20px; line-height: 40px; cursor: text; font-size: 14px;">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>              
					</li>
					<li class="">
						<a class="text-uppercase text-expanded" href="{{ url('/home') }}">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>

					<li>
						<a class="text-uppercase text-expanded" href="{{ url('/trending') }}"  data-step="5" data-intro="<center> See the most popular photos of Kgpians </center> ">Trending</a>
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
									<a href="{{ url('/readall') }}" class="text-dark">
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
											<img src="../{{$pic[0]}}" class="img-responsive img-circle" style="width: 35px; height: 35px">
										</div>
										<p class="notify-details" style="font-family: Verdana">
											<strong>{{$commentedBy[0]}}</strong> commented on your post: <br>
											<span>&nbsp"{{$notification['comments']}}"</span>
											<small class="text-muted">{{$notification['created_at']->diffForHumans()}}</small>
										</p>
									</button><!--/ dropdown-item-->
									@endforeach
									@endif
									@if(count($notifications))
									@foreach($notifications as $notification)
									<a href="{{ url('/read/'.$notification['id']) }}" class="dropdown-item notify-item">
										@php
										$pic = App\User::where('name',$notification['user'])->pluck('pro_pic');
										@endphp
										<div class="notify-icon">
											<img src="../{{$pic[0]}}" class="img-responsive img-circle" style="width: 35px; height: 35px">
										</div>
										<p class="notify-details" style="font-family: Verdana">
											<strong>{{$notification['user']}}</strong> wrote :<br>
											<span>&nbsp"{{$notification['views']}}"</span>
											<small class="text-muted">{{$notification['created_at']->diffForHumans()}}</small>
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
									<a href="#" class="text-dark"></a> 
								</span>Settings
							</h6>
						</div>

						<div style="height: 35px;">
							<a class="dropdown-item " href="{{ url('/details') }}"><p style="font-family: 'Abhaya Libre', serif;">Edit Details</p></a>
						</div>
						<div >
							<a class="dropdown-item " href="{{ url('/logout') }}"><p style="font-family: 'Abhaya Libre', serif;">Logout</p> </a>
						</div>

					</div><!--/ dropdown-menu-->
				</li>  
				<li class="dropdown mega-avatar">  
					<a href="{{ url('/profile_index') }}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
						<span class="avatar w-32">                  
							@if(!empty(Auth::user()->pro_pic))
							<img class="img-fluid img-circle pro_pic" src="{{Auth::user()->thumbnail}}" style="width: 35px; height: 35px;">
							@else
							<img class="img-fluid img-circle pro_pic" src="{{ asset('index.png') }}" style="width: 35px; height: 35px;">
							@endif
						</span>
						<!-- hidden-xs hides the username on small devices so only the image appears. -->
						<span class="hidden-xs">
							&nbsp{{Auth::user()->name}}
						</span>
					</a>
					
				</li><!-- /navbar-item `--> 

			</ul><!-- /.sign-in -->   
		</div><!-- /.nav-right -->
	</div><!-- /.container -->
</nav><!-- /.navbar -->

</header>
<!-- Page Header --> 
<section class="nav-sec">
    <div class="d-flex justify-content-between">
     <div id="polls" class="p-2 nav-icon-lg dark-black">
     <a class="nav-icon" href="{{ url('/polls') }}"><i class="fas fa-chart-bar" style="font-size: 30px;padding: 0px 0px 10px 0px;"></i><span>Polls</span>
     </a>
     </div>
     <div class="p-2 nav-icon-lg clean-black">
     <a class="nav-icon test" href="#" data-toggle="modal" data-target="#modal_test"><i class="fas fa-marker" style="font-size: 30px;padding: 0px 0px 10px 0px;"></i>
    <span>Testimonials</span>
     </a>
     </div>
     <div id="fillbucket" class="p-2 nav-icon-lg dark-black">
     <a class="nav-icon" href="{{ url('/bucket') }}"><i class="fa fa-bitbucket" style="font-size: 30px;padding: 0px 0px 10px 0px;"></i>
    <span>Fill Bucket</span>
     </a>
     </div>
     <div id="viewbucket" class="p-2 nav-icon-lg clean-black">
     <a class="nav-icon" href="{{ url('/viewbucket') }}"><em class="fa fa-align-left"></em>
    <span>View Bucket</span>
     </a>
     </div>
     <div id="trending" class="p-2 nav-icon-lg dark-black">
     <a class="nav-icon" href="{{ url('/trending') }}"><i class="fab fa-gripfire" style="font-size: 35px;padding: 0px 0px 10px 0px;"></i>
    <span>Trending</span>
     </a>
     </div>
    </div>
    <div id="modal_test" class="modal fade" role="dialog">
    	<div class="modal-dialog">
    		<!-- Modal content-->
    		<div class="modal-content">
    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    				<center><h4 class="modal-title text-uppercase" style="color: #000">Write Testimonials</h4></center>
    			</div>
    			<div class="modal-body"><center>
    				<div class="search-dashboard">
    					<form action="{{ url('/search') }}" method="POST" class="form-inline">
    						{{ csrf_field() }}
    						<input placeholder=" Search Your Friend Here..." type="text" name="search" required="required" id="search1" style="background: none; border: 1px solid; border-radius: 5px; padding-top: 3px; padding-left: 10px; line-height: 40px; cursor: text; font-size: 14px;">
    						<input type="submit" value="Search" class="kafe-btn kafe-btn-mint" style="padding: 8px 22px; color: #fff"></input>
    					</form>
    				</div></center>
    			</div>
    			<div class="modal-footer">
    			</div>
    		</div>
    	</div>
    </div>
  </section>

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
        document.getElementById('profile').href = "{{ url('/profile_index/') }}" + '/' + image["rollno"];
        document.getElementById('image').src = image["pic"];
        document.getElementById('posted_by').innerHTML = image["name"];
        document.getElementById('created_at').innerHTML = image["created_at"];
      },
      error: function(data)
      {

      }
    });
  });

	var user = <?php echo $user;?>;
      // console.log(user[0].name);
      var names = [];
      for (var i = 0; i < user.length; i++) {
      	names[i] = user[i].name + ' | ' + user[i].rollno;
      }
      // console.log('names',names);

      $(document).ready(function() {
      	$('#search').autocomplete({
      		source: [names]
      	}); 
      	$('#search1').autocomplete({
      		source: [names]
      	});  
      });
      $(function () {
      	$('[data-toggle="tooltip"]').tooltip()
      });
    </script>