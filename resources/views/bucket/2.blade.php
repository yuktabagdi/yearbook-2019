<div class="col-sm-4">
  @php
  $myview = App\Bucket::where('roll', Auth::user()->rollno)->where('list', 4)->get()->toArray();
  @endphp
  @if(!empty($myview))
  <aside class="profile-card" style="background: url({{$myview[0]['pic']}}); background-size: 100% 100%; background-repeat: no-repeat;">
    <header>
      <h1>Howrah Bridges</h1><i class="fa fa-check-circle" style="color: #5cb85c; font-size: 30px;" title="Task Completed!" title="Task Completed!"></i>
      <h2>Cruise ride under the</h2><br> 
      <h2>Howrah Bridge</h2>
    </header>
    <div class="profile-bio" style="text-align: center;">
      <form action="/bucketpost/4" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" required="required" name="fileToUpload" >
        <br><br>
        <input type="submit" value="Change" name="submit" class="btn btn-success" align="right">
      </form>
    </div>
  </aside><br>
  @else
  <aside class="profile-card" style="background: url(https://s-media-cache-ak0.pinimg.com/736x/3a/1f/02/3a1f02c10700daa80655a302c5a27acf.jpg);">
    <header>
      <h1>Howrah Bridges</h1>
      <h2>Cruise ride under the</h2><br> 
      <h2>Howrah Bridge</h2>
    </header>
    <div class="profile-bio" style="text-align: center;">
      <form action="/bucketpost/4" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" required="required" name="fileToUpload" >
        <br><br>
        <input type="submit" value="Upload Image" name="submit" class="btn btn-success" align="right">
      </form>
    </div>
  </aside><br>
  @endif
</div>

<div class="col-sm-4">
  @php
  $myview = App\Bucket::where('roll', Auth::user()->rollno)->where('list', 5)->get()->toArray();
  @endphp
  @if(!empty($myview))
  <aside class="profile-card" style="background: url({{$myview[0]['pic']}}); background-size: 100% 100%; background-repeat: no-repeat;">
    <header>
      <h1>Star Gazing</h1><i class="fa fa-check-circle" style="color: #5cb85c; font-size: 30px;" title="Task Completed!"></i>
      <h2>Star gazing at the</h2><br> 
      <h2>romantic lake</h2>
    </header>
    <div class="profile-bio" style="text-align: center;">
      <form action="/bucketpost/5" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" required="required" name="fileToUpload" >
        <br><br>
        <input type="submit" value="Change" name="submit" class="btn btn-success" align="right">
      </form>
    </div>
  </aside><br>
  @else
  <aside class="profile-card" style="background: url(https://s-media-cache-ak0.pinimg.com/736x/3a/1f/02/3a1f02c10700daa80655a302c5a27acf.jpg);">
    <header>
      <h1>Star Gazing</h1>
      <h2>Star gazing at the</h2><br> 
      <h2>romantic lake</h2>
    </header>
    <div class="profile-bio" style="text-align: center;">
      <form action="/bucketpost/5" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" required="required" name="fileToUpload" >
        <br><br>
        <input type="submit" value="Upload Image" name="submit" class="btn btn-success" align="right">
      </form>
    </div>
  </aside><br>
  @endif
</div>

<div class="col-sm-4">
  @php
  $myview = App\Bucket::where('roll', Auth::user()->rollno)->where('list', 6)->get()->toArray() ;
  @endphp
  @if(!empty($myview))
  <aside class="profile-card" style="background: url({{$myview[0]['pic']}}); background-size: 100% 100%; background-repeat: no-repeat;">
    <header>
      <h1>Twilight View</h1><i class="fa fa-check-circle" style="color: #5cb85c; font-size: 30px;" title="Task Completed!"></i>
      <h2>Twilight view from</h2><br> 
      <h2>Nalanda top</h2>
    </header>
    <div class="profile-bio" style="text-align: center;">
      <form action="/bucketpost/6" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" required="required" name="fileToUpload" >
        <br><br>
        <input type="submit" value="Change" name="submit" class="btn btn-success" align="right">
      </form>
    </div>
  </aside><br>
  @else
  <aside class="profile-card" style="background: url(https://s-media-cache-ak0.pinimg.com/736x/3a/1f/02/3a1f02c10700daa80655a302c5a27acf.jpg);">
    <header>
      <h1>Twilight View</h1>
      <h2>Twilight view from</h2><br> 
      <h2>Nalanda top</h2>
    </header>
    <div class="profile-bio" style="text-align: center;">
      <form action="/bucketpost/6" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" required="required" name="fileToUpload" >
        <br><br>
        <input type="submit" value="Upload Image" name="submit" class="btn btn-success" align="right">
      </form>
    </div>
  </aside><br>
  @endif
</div>