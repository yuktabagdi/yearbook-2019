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
        <link rel="apple-touch-icon" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/apple-touch-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-touch-icon-114x114.png') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
        
        <!-- ==============================================
        CSS
        =============================================== -->
        <link type="text/css" href="{{ asset('css/demos/photo.css') }}" rel="stylesheet" />
        <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
        <!-- ==============================================
        Feauture Detection
        =============================================== -->
        <style type="text/css">
        .back{
          background-image: url('https://i.pinimg.com/736x/42/9d/76/429d769242867994c24d60a31972db9b.jpg');
          background-attachment: fixed;
        }
        @media(max-width: 500px){
          .product-item-img{
            height: 200px !important;
          }
        }   
        </style>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    </head>
    <body>
        <!--Navigation Section -->
        @include('navbar')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/base.js') }}"></script>
        <script src="{{ asset('plugins/slimscroll/jquery.slimscroll.js') }}"></script>
               

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
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q1']))
                                                        <input placeholder="Sample Ans" type="text" name="q1" required="required" id="q1" value="{{$polls['q1']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q1" required="required" id="q1">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
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
                                                <div class="col-sm-8">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q2']))
                                                        <input placeholder="Sample Ans" type="text" name="q2" required="required" id="q2" value="{{$polls['q2']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q2" required="required" id="q2">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-4">
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
                                                <div class="col-sm-8">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q3']))
                                                        <input placeholder="Sample Ans" type="text" name="q3" required="required" id="q3" value="{{$polls['q3']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q3" required="required" id="q3">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-4">
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
                                                <div class="col-sm-8">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q4']))
                                                        <input placeholder="Sample Ans" type="text" name="q4" required="required" id="q4" value="{{$polls['q4']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q4" required="required" id="q4">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-4">
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
                                                <div class="col-sm-8">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q5']))
                                                        <input placeholder="Sample Ans" type="text" name="q5" required="required" id="q5" value="{{$polls['q5']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q5" required="required" id="q5">
                                                        @endif
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-sm-4">
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

                            <li>
                                <div class="media first_child">
                                   <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                                    <form action="{{ url('/polls/6') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Gabbar of the Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q6']))
                                                        <input placeholder="Sample Ans" type="text" name="q6" required="required" id="q6" value="{{$polls['q6']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q6" required="required" id="q6">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r6"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==6)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[6]))
                                                <?php $x[6]=array_keys($res[6]);$y[6] = array_values($res[6]); ?>
                                                <div class ="collapse" id="r6" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart6" width="400" height="400"></canvas>
                                                    <script>
                                                        var x6 =  <?php echo json_encode($x[6]); ?>;
                                                        var y6 =  <?php echo json_encode($y[6]); ?>;
                                                        var ctx6 = document.getElementById("myChart6").getContext('2d');
                                                        var myChart6 = new Chart(ctx6, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x6,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y6,
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
                                    <form action="{{ url('/polls/7') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Monica Geller of The Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q7']))
                                                        <input placeholder="Sample Ans" type="text" name="q7" required="required" id="q7" value="{{$polls['q7']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q7" required="required" id="q7">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r7"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==7)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[7]))
                                                <?php $x[7]=array_keys($res[7]);$y[7] = array_values($res[7]); ?>
                                                <div class ="collapse" id="r7" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart7" width="400" height="400"></canvas>
                                                    <script>
                                                        var x7 =  <?php echo json_encode($x[7]); ?>;
                                                        var y7 =  <?php echo json_encode($y[7]); ?>;
                                                        var ctx7 = document.getElementById("myChart7").getContext('2d');
                                                        var myChart7 = new Chart(ctx7, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x7,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y7,
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
                                    <form action="{{ url('/polls/8') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Nightingale of The Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q8']))
                                                        <input placeholder="Sample Ans" type="text" name="q8" required="required" id="q8" value="{{$polls['q8']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q8" required="required" id="q8">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r8"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==8)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[8]))
                                                <?php $x[8]=array_keys($res[8]);$y[8] = array_values($res[8]); ?>
                                                <div class ="collapse" id="r8" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart8" width="400" height="400"></canvas>
                                                    <script>
                                                        var x8 =  <?php echo json_encode($x[8]); ?>;
                                                        var y8 =  <?php echo json_encode($y[8]); ?>;
                                                        var ctx8 = document.getElementById("myChart8").getContext('2d');
                                                        var myChart8 = new Chart(ctx8, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x8,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y8,
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
                                    <form action="{{ url('/polls/9') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Rancho of The Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q9']))
                                                        <input placeholder="Sample Ans" type="text" name="q9" required="required" id="q9" value="{{$polls['q9']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q9" required="required" id="q9">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r9"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==9)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[9]))
                                                <?php $x[9]=array_keys($res[9]);$y[9] = array_values($res[9]); ?>
                                                <div class ="collapse" id="r9" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart9" width="400" height="400"></canvas>
                                                    <script>
                                                        var x9 =  <?php echo json_encode($x[9]); ?>;
                                                        var y9 =  <?php echo json_encode($y[9]); ?>;
                                                        var ctx9 = document.getElementById("myChart9").getContext('2d');
                                                        var myChart9 = new Chart(ctx9, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x9,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y9,
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
                                    <form action="{{ url('/polls/10') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Mr.Bean of The Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q10']))
                                                        <input placeholder="Sample Ans" type="text" name="q10" required="required" id="q10" value="{{$polls['q10']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q10" required="required" id="q10">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r10"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==10)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[10]))
                                                <?php $x[10]=array_keys($res[10]);$y[10] = array_values($res[10]); ?>
                                                <div class ="collapse" id="r10" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart10" width="400" height="400"></canvas>
                                                    <script>
                                                        var x10 =  <?php echo json_encode($x[10]); ?>;
                                                        var y10 =  <?php echo json_encode($y[10]); ?>;
                                                        var ctx10 = document.getElementById("myChart10").getContext('2d');
                                                        var myChart10 = new Chart(ctx10, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x10,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y10,
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
                                    <form action="{{ url('/polls/11') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>High on Life</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q11']))
                                                        <input placeholder="Sample Ans" type="text" name="q11" required="required" id="q11" value="{{$polls['q11']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q11" required="required" id="q11">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r11"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==11)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[11]))
                                                <?php $x[11]=array_keys($res[11]);$y[11] = array_values($res[11]); ?>
                                                <div class ="collapse" id="r11" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart11" width="400" height="400"></canvas>
                                                    <script>
                                                        var x10 =  <?php echo json_encode($x[11]); ?>;
                                                        var y10 =  <?php echo json_encode($y[11]); ?>;
                                                        var ctx10 = document.getElementById("myChart11").getContext('2d');
                                                        var myChart10 = new Chart(ctx10, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x10,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y10,
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
                                    <form action="{{ url('/polls/12') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Mr.Late Lateef</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q12']))
                                                        <input placeholder="Sample Ans" type="text" name="q12" required="required" id="q12" value="{{$polls['q12']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q12" required="required" id="q12">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r12"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==12)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[12]))
                                                <?php $x[12]=array_keys($res[12]);$y[12] = array_values($res[12]); ?>
                                                <div class ="collapse" id="r12" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart12" width="400" height="400"></canvas>
                                                    <script>
                                                        var x10 =  <?php echo json_encode($x[12]); ?>;
                                                        var y10 =  <?php echo json_encode($y[12]); ?>;
                                                        var ctx10 = document.getElementById("myChart12").getContext('2d');
                                                        var myChart10 = new Chart(ctx10, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x10,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y10,
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
                                    <form action="{{ url('/polls/13') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Frequent Flyer of The Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q13']))
                                                        <input placeholder="Sample Ans" type="text" name="q13" required="required" id="q13" value="{{$polls['q13']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q13" required="required" id="q13">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r13"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==13)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[13]))
                                                <?php $x[13]=array_keys($res[13]);$y[13] = array_values($res[13]); ?>
                                                <div class ="collapse" id="r13" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart13" width="400" height="400"></canvas>
                                                    <script>
                                                        var x10 =  <?php echo json_encode($x[13]); ?>;
                                                        var y10 =  <?php echo json_encode($y[13]); ?>;
                                                        var ctx10 = document.getElementById("myChart13").getContext('2d');
                                                        var myChart10 = new Chart(ctx10, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x10,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y10,
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
                                    <form action="{{ url('/polls/14') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="media_body">
                                            <p><b>Starboy of The Batch</b></p>
                                            <div class="row" style="display: inline-block;">
                                                <div class="col-sm-8  ">
                                                <div class="">
                                                    <div class="input-field">
                                                        @if(!empty($polls['q14']))
                                                        <input placeholder="Sample Ans" type="text" name="q14" required="required" id="q14" value="{{$polls['q14']}}">
                                                        @else
                                                        <input placeholder="Sample Ans" type="text" name="q14" required="required" id="q14">
                                                        @endif
                                                    </div>
                                                </div>                                     
                                                </div>
                                                <div class="col-sm-2" >
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <button type="submit" class="btn btn-success"><i class="material-icons"> done </i></button>                                                    
                                                </div>
                                                
                                                <div class="form-group" style="margin-left: 20px;">
                                                    <a data-toggle="collapse" data-target="#r14"  class="btn btn-primary">Results</a>
                                                </div>
                                                
                                                </div>
                                                @if(implode(" ",$errors->get(0))==14)
                                                <div class="alert alert-danger">
                                                  <strong>Error!</strong> {{implode(" ",$errors->get(1))}}
                                                </div>
                                                @endif
                                                @if(!empty($res[14]))
                                                <?php $x[14]=array_keys($res[14]);$y[14] = array_values($res[14]); ?>
                                                <div class ="collapse" id="r14" style="width: 300px;height: 300px;">
                                                    <canvas id="myChart14" width="400" height="400"></canvas>
                                                    <script>
                                                        var x10 =  <?php echo json_encode($x[14]); ?>;
                                                        var y10 =  <?php echo json_encode($y[14]); ?>;
                                                        var ctx10 = document.getElementById("myChart14").getContext('2d');
                                                        var myChart10 = new Chart(ctx10, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: x10,
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: y10,
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
          $('.input-field').children().css({"background-color": "#f4f4f4", "border": "none", "border-radius": "5px", "padding-top": "3px", "padding-left": "5px", "line-height": "33px", "cursor": "text"});
            $(document).ready(function() {
            $('#q1, #q2, #q3, #q4, #q5, #q6, #q7, #q8, #q9, #q10, #q11, #q12, #q13, #q14').autocomplete({
            source: [names]
            });
            });
            $(function () {
            $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

        @include('footer')
    </body>
</html>