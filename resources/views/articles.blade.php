
<style type="text/css">
  .table-scrollable
  {

    height: 350px;
    overflow: scroll;
  }
</style>


<div  class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-color: rgba(67,100,107,0.75);">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col" style="width: 800px; height: 500px;">
            <img src="" class="enlargeImageModalSource" style="height: 100%;width: 100%; object-fit: contain;">
          </div>
          <div class="col" style="margin-right: 11px ; border: 1px solid;">
            <br>
            <form class="form" id="form-comment" action="/comment" method="post">
              {{csrf_field()}}
              <input id="comment-token" type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <textarea name="comment" id="textarea" class="form-control" required="required" placeholder="Your comments here..."></textarea>
              </div>
              <div class="row">
                <div class="col"><button class="btn btn-success" style="width: 100%;" id="submitt">Comment</button></div>
                <div class="col approval" id="like"></div>
              </div>
            </form>
<br>


            <div id="comments" class="table-scrollable" style="text-align: center;">
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

@foreach($writeups as $writeup)
      <b>{{ $writeup->topic }}:</b>
      <p onblur="update({{ $writeup->id }})" id="{{ $writeup->id }}" contenteditable >{!!  nl2br($writeup->writeup)!!}</p>
  @endforeach

  
<script type="text/javascript">


  $('#like').click('#like', function() {
    var formData = {

      'pic_id' : $('.enlargeImageModalSource').attr('id'),
      '_token' : $('#comment-token').val()
    }

    $.ajax({
      url: "/likeadd",
      type: "POST",
      data: formData,

      success: function(response)
      {

       document.getElementById("like").innerHTML = response;
     },
     error: function(data)
     {

     }
   });

  });
  $(function() {
    $('.product-item-img').on('click', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
      $('.enlargeImageModalSource').attr('id', $(this).attr('id'));
      $('#enlargeImageModal').modal('show');
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
        url: "/likes",
        type: "POST",
        data: formData,

        success: function(response)
        {

          document.getElementById("like").innerHTML = response;

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
    console.log(formData);

    $.ajax({
      url: "/comment",
      type: "POST",
      data: formData,

      success: function(response)
      {
        console.log('Added Comments');
        document.getElementById("textarea").value="";
        document.getElementById("comments").innerHTML = response;
      },
      error: function(data)
      {
        console.log('Error in comment');  
      }
    });
  });
  });

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })


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