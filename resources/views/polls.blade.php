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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <style type="text/css">
        .back{
          background-image: url('http://svite-league-apps-content.s3.amazonaws.com/bgimages/subtle-checkers.jpg');
          background-attachment: fixed;
        }
        @media(max-width: 500px){
          .product-item-img{
            height: 200px !important;
          }
        }   
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!--Navigation Section -->
        @include('navbar')

               

        <section class="notifications back">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <ul>
                            <li>
                                <div class="media first_child">
                                   <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="{{ url('/polls/1') }}" method="POST">
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
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r1"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==1)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[1]))
                                                <?php $x[1]=array_keys($res[1]);$y[1] = array_values($res[1]); ?>
                                                <div class ="collapse" id="r1" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart1" width="400" height="400"></canvas>
                                                    <script>
                                                        var x1 =  <?php echo json_encode($x[1]); ?>;
                                                        var y1 =  <?php echo json_encode($y[1]); ?>;
                                                        var ctx1 = document.getElementById("myChart1").getContext('2d');
                                                        var myChart1 = new Chart(ctx1, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x1,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y1,
                                                                    backgroundColor: [
                                                                        'rgba(255, 99, 132, 0.2)',
                                                                        'rgba(54, 162, 235, 0.2)',
                                                                        'rgba(255, 206, 86, 0.2)',
                                                                        'rgba(75, 192, 192, 0.2)',
                                                                        'rgba(153, 102, 255, 0.2)',
                                                                        'rgba(255, 159, 64, 0.2)'
                                                                    ],
                                                                    borderColor: [
                                                                        'rgba(255,99,132,1)',
                                                                        'rgba(54, 162, 235, 1)',
                                                                        'rgba(255, 206, 86, 1)',
                                                                        'rgba(75, 192, 192, 1)',
                                                                        'rgba(153, 102, 255, 1)',
                                                                        'rgba(255, 159, 64, 1)'
                                                                    ],
                                                                    borderWidth: 1
                                                                }]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    yAxes: [{
                                                                        ticks: {
                                                                            beginAtZero:true
                                                                        }
                                                                    }]
                                                                }
                                                            }
                                                        });
                                                    </script>
                                                    
                                                </div>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </li>
                            <li>
                                <div class="media first_child">
                                   <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="{{ url('/polls/2') }}" method="POST">
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
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r2" class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==2)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[2]))
                                                <?php $x[2]=array_keys($res[2]);$y[2] = array_values($res[2]); ?>
                                                <div class ="collapse" id="r2" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart2" width="400" height="400"></canvas>
                                                    <script>
                                                        var x2 =  <?php echo json_encode($x[2]); ?>;
                                                        var y2 =  <?php echo json_encode($y[2]); ?>;
                                                        var ctx2 = document.getElementById("myChart2").getContext('2d');
                                                        var myChart2 = new Chart(ctx2, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x2,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y2,
                                                                    backgroundColor: [
                                                                        'rgba(255, 99, 132, 0.2)',
                                                                        'rgba(54, 162, 235, 0.2)',
                                                                        'rgba(255, 206, 86, 0.2)',
                                                                        'rgba(75, 192, 192, 0.2)',
                                                                        'rgba(153, 102, 255, 0.2)',
                                                                        'rgba(255, 159, 64, 0.2)'
                                                                    ],
                                                                    borderColor: [
                                                                        'rgba(255,99,132,1)',
                                                                        'rgba(54, 162, 235, 1)',
                                                                        'rgba(255, 206, 86, 1)',
                                                                        'rgba(75, 192, 192, 1)',
                                                                        'rgba(153, 102, 255, 1)',
                                                                        'rgba(255, 159, 64, 1)'
                                                                    ],
                                                                    borderWidth: 1
                                                                }]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    yAxes: [{
                                                                        ticks: {
                                                                            beginAtZero:true
                                                                        }
                                                                    }]
                                                                }
                                                            }
                                                        });
                                                    </script>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li>
                                <div class="media first_child">
                                   <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="{{ url('/polls/3') }}" method="POST">
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
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r3" class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==3)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[3]))
                                                <?php $x[3]=array_keys($res[3]);$y[3] = array_values($res[3]); ?>
                                                <div class ="collapse" id="r3" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart3" width="400" height="400"></canvas>
                                                    <script>
                                                        var x3 =  <?php echo json_encode($x[3]); ?>;
                                                        var y3 =  <?php echo json_encode($y[3]); ?>;
                                                        var ctx3 = document.getElementById("myChart3").getContext('2d');
                                                        var myChart3 = new Chart(ctx3, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x3,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y3,
                                                                    backgroundColor: [
                                                                        'rgba(255, 99, 132, 0.2)',
                                                                        'rgba(54, 162, 235, 0.2)',
                                                                        'rgba(255, 206, 86, 0.2)',
                                                                        'rgba(75, 192, 192, 0.2)',
                                                                        'rgba(153, 102, 255, 0.2)',
                                                                        'rgba(255, 159, 64, 0.2)'
                                                                    ],
                                                                    borderColor: [
                                                                        'rgba(255,99,132,1)',
                                                                        'rgba(54, 162, 235, 1)',
                                                                        'rgba(255, 206, 86, 1)',
                                                                        'rgba(75, 192, 192, 1)',
                                                                        'rgba(153, 102, 255, 1)',
                                                                        'rgba(255, 159, 64, 1)'
                                                                    ],
                                                                    borderWidth: 1
                                                                }]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    yAxes: [{
                                                                        ticks: {
                                                                            beginAtZero:true
                                                                        }
                                                                    }]
                                                                }
                                                            }
                                                        });
                                                    </script>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li>
                                <div class="media first_child">
                                   <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="{{ url('/polls/4') }}" method="POST">
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
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r4" class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==4)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[4]))
                                                <?php $x[4] =array_keys($res[4]);$y[4] = array_values($res[4]); ?>
                                                <div class ="collapse" id="r4" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart4" width="400" height="400"></canvas>
                                                    <script>
                                                        var x4 =  <?php echo json_encode($x[4]); ?>;
                                                        var y4 =  <?php echo json_encode($y[4]); ?>;
                                                        var ctx4 = document.getElementById("myChart4").getContext('2d');
                                                        var myChart4 = new Chart(ctx4, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x4,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y4,
                                                                    backgroundColor: [
                                                                        'rgba(255, 99, 132, 0.2)',
                                                                        'rgba(54, 162, 235, 0.2)',
                                                                        'rgba(255, 206, 86, 0.2)',
                                                                        'rgba(75, 192, 192, 0.2)',
                                                                        'rgba(153, 102, 255, 0.2)',
                                                                        'rgba(255, 159, 64, 0.2)'
                                                                    ],
                                                                    borderColor: [
                                                                        'rgba(255,99,132,1)',
                                                                        'rgba(54, 162, 235, 1)',
                                                                        'rgba(255, 206, 86, 1)',
                                                                        'rgba(75, 192, 192, 1)',
                                                                        'rgba(153, 102, 255, 1)',
                                                                        'rgba(255, 159, 64, 1)'
                                                                    ],
                                                                    borderWidth: 1
                                                                }]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    yAxes: [{
                                                                        ticks: {
                                                                            beginAtZero:true
                                                                        }
                                                                    }]
                                                                }
                                                            }
                                                        });
                                                    </script>
                                                    
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <li>
                                <div class="media first_child">
                                   <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="{{ url('/polls/5') }}" method="POST">
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
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r5" class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==5)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[5]))
                                                <?php $x[5] =array_keys($res[5]);$y[5] = array_values($res[5]); ?>
                                                <div class ="collapse" id="r5" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart5" width="400" height="400"></canvas>
                                                    <script>
                                                        var x5 =  <?php echo json_encode($x[5]); ?>;
                                                        var y5 =  <?php echo json_encode($y[5]); ?>;
                                                        var ctx5 = document.getElementById("myChart5").getContext('2d');
                                                        var myChart5 = new Chart(ctx5, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x5,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y5,
                                                                    backgroundColor: [
                                                                        'rgba(255, 99, 132, 0.2)',
                                                                        'rgba(54, 162, 235, 0.2)',
                                                                        'rgba(255, 206, 86, 0.2)',
                                                                        'rgba(75, 192, 192, 0.2)',
                                                                        'rgba(153, 102, 255, 0.2)',
                                                                        'rgba(255, 159, 64, 0.2)'
                                                                    ],
                                                                    borderColor: [
                                                                        'rgba(255,99,132,1)',
                                                                        'rgba(54, 162, 235, 1)',
                                                                        'rgba(255, 206, 86, 1)',
                                                                        'rgba(75, 192, 192, 1)',
                                                                        'rgba(153, 102, 255, 1)',
                                                                        'rgba(255, 159, 64, 1)'
                                                                    ],
                                                                    borderWidth: 1
                                                                }]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    yAxes: [{
                                                                        ticks: {
                                                                            beginAtZero:true
                                                                        }
                                                                    }]
                                                                }
                                                            }
                                                        });
                                                    </script>
                                                    
                                                </div>
                                                @endif
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