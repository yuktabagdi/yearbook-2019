<div class="col-md-3 back" style="padding-top: 2.8%;" >
      <div style="margin-right: 5%">
      <div class="panel panel-primary" style = "border-width : 0px">
        <div class="panel-heading" style = "background-color : #0FC19E; border-width : 0px">
                <h3 class="panel-title"><span class="fa fa-line-chart"></span> POLLS</h3>
            </div>
            <div class="panel-body" >
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

      <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

            <div class="item active" style = "margin-top : 10px" >
              <div class="image">
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
                                    <input placeholder="Enter name..." type="text" name="q1" required="required" id="q1" value="{{$polls['q1']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q1" required="required" id="q1">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/2') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Nightingale of the Batch</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q2']))
                                    <input placeholder="Enter name..." type="text" name="q2" required="required" id="q2" value="{{$polls['q2']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q2" required="required" id="q2">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/3') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Rancho of the Batch</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q3']))
                                    <input placeholder="Enter name..." type="text" name="q3" required="required" id="q3" value="{{$polls['q3']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q3" required="required" id="q3">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image" style = "z-index : -1">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/4') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>High on Life</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q4']))
                                    <input placeholder="Enter name..." type="text" name="q4" required="required" id="q4" value="{{$polls['q4']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q4" required="required" id="q4">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
          </div>
            

          <div class="item" style = "margin-top : 10px">
              <div class="image">
              <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/5') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Mr. Bean</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q5']))
                                    <input placeholder="Enter name..." type="text" name="q5" required="required" id="q5" value="{{$polls['q5']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q5" required="required" id="q5">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/6') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Neta of the Batch</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q6']))
                                    <input placeholder="Enter name..." type="text" name="q6" required="required" id="q6" value="{{$polls['q6']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q6" required="required" id="q6">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/7') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Late Latif</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q7']))
                                    <input placeholder="Enter name..." type="text" name="q7" required="required" id="q7" value="{{$polls['q7']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q7" required="required" id="q7">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image" style = "z-index : -1">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/8') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Richie Rich</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q8']))
                                    <input placeholder="Enter name..." type="text" name="q8" required="required" id="q8" value="{{$polls['q8']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q8" required="required" id="q8">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
          </div>



          <div class="item" style = "margin-top : 10px">
              <div class="image">
              <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/9') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Johnny Bravo</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q9']))
                                    <input placeholder="Enter name..." type="text" name="q9" required="required" id="q9" value="{{$polls['q9']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q9" required="required" id="q9">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/10') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Social Butterfly</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q10']))
                                    <input placeholder="Enter name..." type="text" name="q10" required="required" id="q10" value="{{$polls['q10']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q10" required="required" id="q10">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/11') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Guruji of the Batch</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q11']))
                                    <input placeholder="Enter name..." type="text" name="q11" required="required" id="q11" value="{{$polls['q11']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q11" required="required" id="q11">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
            <div class="image" style = "z-index : -1">
            <img src="{{ asset('img/ques.png') }}" alt="" class="img-responsive img-circle">
                <form action="{{ url('/polls/12') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media_body">
                        <p><b>Got 'em Moves</b></p>
                        <div class="row" style="display: inline-block;">
                          <div class="col-sm-8  ">
                            <div class="">
                                <div class="input-field">
                                    @if(!empty($polls['q12']))
                                    <input placeholder="Enter name..." type="text" name="q12" required="required" id="q12" value="{{$polls['q12']}}">
                                    @else
                                    <input placeholder="Enter name..." type="text" name="q12" required="required" id="q12">
                                    @endif
                                </div>
                            </div>                                     
                          </div>
                          <div class="col-sm-2" >
                            <div class="form-group" style="margin-left: 10px">
                                <button type="submit" class="btn btn-success"><i class="material-icons" style = "font-size : 15px"> done </i></button>                                                    
                            </div>      
                          </div>
                        </div>
                      </div>
                </form>
            </div>
          </div>

          </div>
          
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          </a>
        </div>
            </div>
            <div class="panel-footer text-center" style = "z-index : -1 !important">
                
                <a href="javascript:void(0)" class="small" style = "color : black">Results will be declared soon!</a>
            </div>
        </div>
    </div>