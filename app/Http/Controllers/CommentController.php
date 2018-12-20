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
    'comments' => request('comments'),
    'user_id' => Auth::user()->id,
  ]);
   //it will increase totalcount by 2 
Image::where('id',request('pic_id'))->increment('totalcount', 2);
   $mydata = Comment::where('pic_id',request('pic_id'))->latest()->get();
   $content = '<ul class="img-comment-list">';
   foreach ($mydata as $view) {
     $name = User::find($view['user_id'])->name;
     $Image = User::find($view['user_id'])->pro_pic;
     $date = $view->created_at->diffForHumans();
     $content = $content.'
     <li>
     <div class="comment-img">
     <img src='.$Image.' class="img-responsive img-circle" alt="Image"/>
     </div>
     <div class="comment-text">
     <strong><a href="photo_profile.html">'.$name.'</a></strong>
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
      $Image = User::find($view['user_id'])->pro_pic;
     $date = $view->created_at->diffForHumans();
     $content = $content.'
     <li>
     <div class="comment-img">
     <img src='.$Image.' class="img-responsive img-circle" alt="Image"/>
     </div>
     <div class="comment-text">
     <strong><a href="photo_profile.html">'.$name.'</a></strong>
     <p>'.$view['comments'].'</p> <span class="date sub-text">'.$date.'</span>
     </div>
     </li>
     ';
   }
   $content = $content.'</ul>';
  return response($content, 200);   
}
}