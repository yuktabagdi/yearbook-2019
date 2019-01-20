<script src="/js/jquery.min.js"></script>
<script src="/js/autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="/css/autocomplete.css">
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
                <a class="navbar-brand" href="index.html"><img src="/img/navbar/SACLogo.png" width="150px" height="75px" style="margin-top:-23px;" /></a>
            </div>
            <!-- /.navbar-header -->
            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                    </ul>
                </div>
            </div>
            <!-- /.navbar-left -->
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
                        <a class="text-uppercase text-expanded" href="/home">Home
                        <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="active">
                        <a class="text-uppercase text-expanded" href="/trending"  data-step="5" data-intro="<center> See the most popular photos of Kgpians </center> ">Trending</a>
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
                                                <img src="../{{$pic[0]}}" class="img-responsive img-circle" style="width: 35px; height: 35px">
                                            </div>
                                            <p class="notify-details" style="font-family: Verdana">
                                                <strong>{{$commentedBy[0]}}</strong> commented on your post: <br>
                                                <span>&nbsp"{{$notification['comments']}}"</span>
                                                <small class="text-muted">{{$notification['created_at']->diffForHumans()}}</small>
                                            </p>
                                        </button>
                                        <!--/ dropdown-item-->
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
                                                <small class="text-muted">{{$notification['created_at']->diffForHumans()}}</small>
                                            </p>
                                        </a>
                                        <!--/ dropdown-item-->
                                        @endforeach
                                        @endif
                                        @if(count($notifications) + count($comment_notification) == 0)
                                        <div class="notify-details" align="center">No New Notifications!</div>
                                        @endif
                                    </div>
                                    <!--/ .Slim-->
                                    <div class="slimScrollBar" style="background: rgb(158, 165, 171); none repeat scroll 0% 0%; width: 8px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div>
                                    <div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div>
                                </div>
                                <!--/ .slimscroll-->
                            </div>
                            <!--/ .slimScrollDiv-->
                            <div class="dropdown-item text-center" style="height: 30px; background-color: #f4f4f4;">
                            </div>
                            <!-- All-->
                        </div>
                        <!--/ dropdown-menu-->
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
                                <a class="dropdown-item " href="/details">
                                    <p style="font-family: 'Abhaya Libre', serif;">Edit Details</p>
                                </a>
                            </div>
                            <div >
                                <a class="dropdown-item " href="/logout">
                                    <p style="font-family: 'Abhaya Libre', serif;">Logout</p>
                                </a>
                            </div>
                        </div>
                        <!--/ dropdown-menu-->
                    </li>
                    <li class="dropdown mega-avatar">
                        <a href="photo_profile.html#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <span class="avatar w-32">
                            @if(!empty(Auth::user()->pro_pic))
                            <img class="img-fluid img-circle" src="/{{Auth::user()->pro_pic}}" style="width: 35px; height: 35px;">
                            @endif
                            </span>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">
                            &nbsp{{Auth::user()->name}}
                            </span>
                        </a>
                    </li>
                    <!-- /navbar-item `-->
                </ul>
                <!-- /.sign-in -->
            </div>
            <!-- /.nav-right -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
</header>
<!-- Page Header -->
<section class="nav-sec">
    <div class="d-flex justify-content-between">
        <div class="p-2 nav-icon-lg dark-black" id="polls">
            <a class="nav-icon" href="/polls"><em class="fa fa-home"></em>
            <span>Polls</span>
            </a>
        </div>
        <div class="p-2 nav-icon-lg clean-black" id="testimonials">
            <a class="nav-icon modal-trigger" href="#modal_test" data-target="#modal_test" ><em class="fa fa-crosshairs"></em>
            <span>Testimonials</span>
            </a>
        </div>
        <div class="p-2 nav-icon-lg dark-black" id="fillbucket">
            <a class="nav-icon" href="/bucket"><em class="fab fa-instagram"></em>
            <span>Fill Bucket</span>
            </a>
        </div>
        <div class="p-2 nav-icon-lg clean-black" id="viewbucket">
            <a class="nav-icon" href="/viewbucket"><em class="fa fa-align-left"></em>
            <span>View Bucket</span>
            </a>
        </div>
        <div class="p-2 nav-icon-lg dark-black">
            <a class="nav-icon" href="#"><em class="fa fa-user"></em>
            <span>Class Map</span>
            </a>
        </div>
    </div>
</section>
<div id="modal_test" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Write testimonials</h4>
            </div>
            <div class="modal-body">
                <div class="search-dashboard">
                    <form action="search/" method="POST" class="form-inline">
                        {{ csrf_field() }}
                        <input placeholder=" Search Your Friend Here..." type="text" name="search" required="required" id="search" style="background: none; border: none; padding-top: 3px; padding-left: 20px; line-height: 40px; cursor: text; font-size: 14px;">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#modal_test').on('click',function() {
    	$('#modal_test').modal('show');
    });
    $('.comment_notification').on('click', function() {
    $('.enlargeImageModalSource').attr('src', '/'+$(this).attr('value'));
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