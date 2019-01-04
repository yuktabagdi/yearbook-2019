<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Auth;
use App\Image;
use DB;
class CommentController extends Controller
{
  public function add()
  { 
   Comment::create([
    'pic_id' => request('pic_id'),
    'roll' => Image::where('id', request('pic_id'))->value('rollno'),
    'comments' => request('comments'),
    'user_id' => Auth::user()->id,
  ]);
   
   //it will increase totalcount by 2 
   Image::where('id',request('pic_id'))->increment('totalcount', 2);
   $mydata = Comment::where('pic_id',request('pic_id'))->latest()->get();

   $content = '<ul class="img-comment-list">';
   foreach ($mydata as $view) {
     $name = User::find($view['user_id'])->name;
     $roll = User::find($view['user_id'])->rollno;
     $pic = User::find($view['user_id'])->pro_pic;
     $date = $view->created_at->toDayDateTimeString();
     $content = $content.'
     <li>
     <div class="comment-img">
     <a href="/profile_index/'.$roll.'">';
     if(!empty($pic)) {
      $content = $content.'<img src="/'.$pic.'" class="img-responsive img-circle"/>';
    }
    else {
      $content = $content.'<img src="img/users/10.jpeg" class="img-responsive img-circle"/>';
    }
    $content = $content.'</a>
    </div>
    <div class="comment-text">
    <strong><a href="/profile_index/'.$roll.'">'.$name.'</a></strong>
    <p>'.$view['comments'].'</p> <span class="date sub-text">'.$date.'</span>
    </div>
    </li>
    ';
  }
  $content = $content.'</ul>';
  return response($content, 200);   
}

public function new()
{
  $mydata = Comment::where('pic_id',request('pic_id'))->latest()->get();

  $content = '<ul class="img-comment-list">';
  foreach ($mydata as $view) {
   $name = User::find($view['user_id'])->name;
   $roll = User::find($view['user_id'])->rollno;
   $pic = User::find($view['user_id'])->pro_pic;
   $date = $view->created_at->toDayDateTimeString();
   $rollno = Image::where('id', request('pic_id'))->value('rollno');
   if($rollno == Auth::user()->rollno){
     $view->seen = 0;
     $view->save();
   }
   $content = $content.'
   <li>
   <div class="comment-img">
   <a href="/profile_index/'.$roll.'">';
   if(!empty($pic)) {
    $content = $content.'<img src="/'.$pic.'" class="img-responsive img-circle"/>';
  }
  else {
    $content = $content.'<img src="img/users/10.jpeg" class="img-responsive img-circle"/>';
  }
  $content = $content.'</a>
  </div>
  <div class="comment-text">
  <strong><a href="/profile_index/'.$roll.'">'.$name.'</a></strong>
  <p>'.$view['comments'].'</p> <span class="date sub-text">'.$date.'</span>
  </div>
  </li>
  ';
}
$content = $content.'</ul>';
return response($content, 200);   

}

}