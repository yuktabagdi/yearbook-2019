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
        <link rel="stylesheet" type="text/css" href="{{ asset('css/autocomplete.css') }}">
        <link rel="icon" href="{{ asset('img/logo.jpg') }}">
        <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- ==============================================
        CSS
        =============================================== -->
        <link type="text/css" href="{{ asset('css/demos/photo.css') }}" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        <!-- ==============================================
        Feauture Detection
        =============================================== -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/autocomplete.js') }}"></script>
        <script src="{{ asset('js/modernizr-custom.js') }}"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--Navigation Section -->
        @include('navbar')
        
        
        
        <section class="notifications">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <ul>
                            <li>
                                <div class="media first_child">
                                    <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="/polls/1" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Maggu of the Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-md-8">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q1']))
                                                        <input placeholder="Sample Ans" type="text" name="q1" required="required" id="q1" value="{{$polls['q1']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q1" required="required" id="q1">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                @if(!empty($polls['q1']))
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a href="/pollres/1" target="_blank" class="btn btn-primary">Results</a>
                                                </div>
                                                @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </li>
                            <li>
                                <div class="media first_child">
                                    <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="/polls/2" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Stud of the batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-md-8">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q2']))
                                                        <input placeholder="Sample Ans" type="text" name="q2" required="required" id="q2" value="{{$polls['q2']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q2" required="required" id="q2">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group" style="margin-left: 20px;" >
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                                @if(!empty($polls['q2']))
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a href="/pollres/2" target="_blank" class="btn btn-primary">Results</a>
                                                </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li>
                                <div class="media first_child">
                                    <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="/polls/3" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Batch ka crush</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-md-8">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q3']))
                                                        <input placeholder="Sample Ans" type="text" name="q3" required="required" id="q3" value="{{$polls['q3']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q3" required="required" id="q3">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group" style="margin-left: 20px;" >
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                                @if(!empty($polls['q3']))
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a href="/pollres/3" target="_blank" class="btn btn-primary">Results</a>
                                                </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li>
                                <div class="media first_child">
                                    <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="/polls/4" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Baba of the batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-md-8">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q4']))
                                                        <input placeholder="Sample Ans" type="text" name="q4" required="required" id="q4" value="{{$polls['q4']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q4" required="required" id="q4">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group" style="margin-left: 20px;" >
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                                @if(!empty($polls['q4']))
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a href="/pollres/4" target="_blank" class="btn btn-primary">Results</a>
                                                </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li>
                                <div class="media first_child">
                                    <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="/polls/5" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Jugaadu of the batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-md-8">
                                                <div class="search-area">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q5']))
                                                        <input placeholder="Sample Ans" type="text" name="q5" required="required" id="q5" value="{{$polls['q5']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q5" required="required" id="q5">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group" style="margin-left: 20px;" >
                                                    <button type="submit" class="btn btn-success" style="margin-top: 0px;"><i class="material-icons"> done </i></button>
                                                </div>
                                                @if(!empty($polls['q5']))
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a href="/pollres/5" target="_blank" class="btn btn-primary">Results</a>
                                                </div>
                                                @endif
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
        


        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/base.js') }}"></script>
        <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.js') }}"></script>
        <script>            
            $('#polls').removeClass('p-2 nav-icon-lg dark-black');
            $('#polls').addClass('p-2 nav-icon-lg mint-green');            
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