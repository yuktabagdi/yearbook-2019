<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>YB|Writeup</title>
   <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style type="text/css">
  
  .dropdown-menu{
    top: 60px;
    right: 0px;
    left: unset;
    width: 460px;
    box-shadow: 0px 5px 7px -1px #c1c1c1;
    padding-bottom: 0px;
    padding: 0px;
  }
  .dropdown-menu:before{
    content: "";
    position: absolute;
    top: -20px;
    right: 12px;
    border:10px solid #343A40;
    border-color: transparent transparent #343A40 transparent;
  }
  .head{
    padding:5px 15px;
    border-radius: 3px 3px 0px 0px;
  }
  .notification-box{
    padding: 10px 0px; 
  }
  .bg-gray{
    background-color: #eee;
  }
  @media (max-width: 640px) {
    .dropdown-menu{
      top: 50px;
      left: -16px;  
      width: 290px;
    } 
    .nav{
      display: block;
    }
    .nav .nav-item,.nav .nav-item a{
      padding-left: 0px;
    }
    .message{
      font-size: 13px;
    }
  }
  .cta .cta-inner:before
  {
    content: none;
  }
  .article{
    background-color: #ffffff;
    border-radius: 10px;
  }
</style>
</head>

<body>

  



    <section class="page-section article">
      <div class="container" style="padding-right: 6vw;padding-left:2vw ">
        <div class="row">
          <div class="col-xl-4 mx-auto">
            <div class=" text-center rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower">Upload Articles</span>
              </h2><br>
              <p class="mb-0"> 
              How have all these years in KGP transformed you? What’s your funniest experience in the campus? Share with us your stories to make it a part of the yearbook that you carry along. Choose the topic below and send us your articles.</p>
              <br>
              <form class="form-horizontal" method="POST" action="/writeup" style="padding-right: 3vw;padding-left: 2vw">
                {{csrf_field()}}
                <div class="row">
                  <div class="col-4">
                   <select name="topic" id="topic" class="form-control" required="required" onchange="showfield(this.options[this.selectedIndex].value)">
                    <option selected disabled value="">Choose your topic</option>
                    <option  value="Spring Fest">Spring Fest</option>
                    <option value="Kshitij">Kshitij</option>
                    <option value="Annual Alumni Meet">Annual Alumni Meet</option>
                    <option value="Life at Kgp">Life at Kgp</option>
                    <option value="Illumination">Illumination</option>
                    <option value="Hall">Hall</option>
                    <option value="Every Place a Story">Every Place has a Story</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col input-group">
                  <span class="input-group-addon"><i class="material-icons prefix">mode_edit</i></span>
                  <textarea name="writeup" id="icon_prefix2" required class="form-control" placeholder="Your article here"></textarea>
                </div>
              </div>
              <br>
              <div class="form-group"> 
                <button class="btn btn-success" type="submit">Submit</button>
              </div>
            </form>
            

          </div>
        </div>
      </div>

    </div>
  </section>
    @foreach($writeups as $writeup)
     <div class="article" style="padding-top:2vw;padding-right: 6vw;padding-left:2vw ">
      
      <h2 class="section-heading mb-4 text-center">
          <a href="/writeup/{{ $writeup->id }}"><i style="float: right;color: black;font-size: 30px" class="material-icons">delete</i></a>
          <span class="section-heading-lower">{{ $writeup->topic }} </span>

      </h2>

      <p style="padding: 2vw;text-align: left" onblur="update({{ $writeup->id }})" id="{{ $writeup->id }}" contenteditable >{!!  nl2br($writeup->writeup)!!}</p>
  </div>
  @endforeach
  
  
</body>


<script type="text/javascript">

 function update(id){
  var writeupedit=$("#"+id).text();
  //console.log(writeupedit);
  $.ajax({
    type: "POST",
    url:' {{ URL::to("/updates") }} ',
    data: {
      writeup: writeupedit,
      id:id,
      _token: $('#signup-token').val()
    }


  });
}
 function showfield(name){
      if(name=='other')document.getElementById('div1').innerHTML='Write your Topic here: <input type="text" name="writeup" />';
      else document.getElementById('div1').innerHTML='';
    }


</script>
</html>
<script type="text/javascript">
  var user = <?php echo $user;?>;
    //console.log(user[0].name);
    var names = [];
    for (var i = 0; i < user.length; i++) {
      names[i] = user[i].name;
    }
    //console.log('names',names);
    
    $(function() {
      $("#search").autocomplete({
        source:[names]
      }); 
    });
  </script>