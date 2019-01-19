<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- ==============================================
        Title and Meta Tags
        =============================================== -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Polls</title>
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    </head>
    <body>
        <!-- ==============================================
        Navigation Section
        =============================================== -->
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
                        <a class="navbar-brand" href="index.html"><img src="img/navbar/SACLogo.png" width="150px" height="75px" style="margin-top:-23px;" /></a>
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
                                        <input placeholder=" Search Your Friend Here..." type="text" name="search" required="required" id="search" style="background: none; border: none; top:2.4px; left: 22px; line-height: 40px; cursor: text; font-size: 14px;">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </li>
                            <li class="">
                                <a class="text-uppercase text-expanded" href="/homenew">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="active">
                                <a class="text-uppercase text-expanded" href="trendingnew"  data-step="5" data-intro="<center> See the most popular photos of Kgpians </center> ">Trending</a>
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
                                                    <img src="../{{$pic[0]}}" class="img-responsive img-circle">
                                                </div>
                                                <p class="notify-details" style="font-family: Verdana">
                                                    <strong>{{$commentedBy[0]}}</strong> commented on your post: <br>
                                                    <span>&nbsp"{{$notification['comments']}}"</span>
                                                    <small class="text-muted">{{$notification['created_at']}}</small>
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
                                                        <small class="text-muted">{{$notification['created_at']}}</small>
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
                                        <img class="img-fluid img-circle" src="{{Auth::user()->pro_pic}}" style="width: 35px; height: 35px;">
                                        @endif
                                    </span>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">
                                        &nbsp{{Auth::user()->name}}
                                    </span>
                                </a>
                                <div class="dropdown-menu w dropdown-menu-scale pull-right">
                                    <a class="dropdown-item" href="photo_profile.html#"><span>New Story</span></a>
                                    <a class="dropdown-item" href="photo_profile.html#"><span>Become a Member</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="photo_profile.html#"><span>Profile</span></a>
                                    <a class="dropdown-item" href="photo_profile.html#"><span>Settings</span></a>
                                    <a class="dropdown-item" href="photo_profile.html#">Need help?</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="photo_profile.html#">Sign out</a>
                                </div>
                            </li>
                            <!-- /navbar-item -->
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
        <!-- ==============================================
        Navbar Second Section
        =============================================== -->
        <section class="nav-sec">
            <div class="d-flex justify-content-between">
                <div class="p-2 nav-icon-lg mint-green">
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
                <div class="p-2 nav-icon-lg dark-black">
                    <a class="nav-icon" href="photo_profile.html"><em class="fa fa-user"></em>
                        <span>Profile</span>
                    </a>
                </div>
            </div>
        </section>
        @if(!empty($polls))
        <section class="notifications">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <ul>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/1" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 1</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q1" required="required" id="q1" value="{{$polls['q1']}}">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/2" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 2</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q2" required="required" id="q2" value="{{$polls['q2']}}">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/3" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 3</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q3" required="required" id="q3" value="{{$polls['q3']}}">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/4" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 4</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q4" required="required" id="q4" value="{{$polls['q4']}}">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/5" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 5</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q5" required="required" id="q5" value="{{$polls['q5']}}">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ row-->
            </div>
        </section>
        @else
        <section class="notifications">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <ul>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/1" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 1</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q1" required="required" id="q1">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/2" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 2</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q2" required="required" id="q2">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/3" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 3</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q3" required="required" id="q3">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/4" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 4</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q4" required="required" id="q4">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="img/ques.png" alt="" class="img-responsive img-circle">
                                    <form action="/polls/5" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Sample Question 5</b></p>
                                            <div class="row">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        <input placeholder="Sample Ans" type="text" name="q5" required="required" id="q5">
                                                    </div>
                                                </div>
                                                <div class="form-group" style="margin-left: 8px;">
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/ row-->
            </div>
        </section>
        @endif


        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/base.js"></script>
        <script src="assets/plugins/slimscroll/jquery.slimscroll.js"></script>
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
            $(document).ready(function() {
            $('#q1').autocomplete({
            source: [names]
            });
            });
            $(document).ready(function() {
            $('#q2').autocomplete({
            source: [names]
            });
            });
            $(document).ready(function() {
            $('#q3').autocomplete({
            source: [names]
            });
            });
            $(document).ready(function() {
            $('#q4').autocomplete({
            source: [names]
            });
            });
            $(document).ready(function() {
            $('#q5').autocomplete({
            source: [names]
            });
            });
            $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </body>
</html>