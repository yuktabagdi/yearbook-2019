<?php

namespace App\Http\Controllers;
use Auth;
use App\Bucket;
use App\views;
use App\User;
use App\Image;
use App\Comment;

use Illuminate\Http\Request;

class BucketController extends Controller
{
     public function __construct()
     {
      $this->middleware('auth');
    }
    public function index()
    {
     $user = User::get();
     $roll = Auth::user()->rollno;
     $id = Auth::user()->id; 
     $notifications = views::where('depmate',$roll)->where('read','1')->get();
     $comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
     ->latest()->get();
     return view('bucket_index',compact('notifications','user', 'comment_notification'));
    }


    public function comment($id)
    {
      $pic = Bucket::where('roll', Auth::user()->rollno)->where('list', $id);
      if(!empty($pic)){
        $pic->delete();
      }
      $file = request('fileToUpload');
      $user = Auth::user();
      $name = $user->rollno.'_bucket_list_'.$id.'_'.time().'.'.$file->getClientOriginalExtension();


      $file->move(public_path().'/uploads/bucket/', $name);
      $roll = Auth::user()->rollno;
      Bucket::create([
        'roll' => $roll,
        'list' => $id,
        'pic' => 'uploads/bucket/'.$name,
        'totalcount' => '0',
        'finalcount' => '0'
      ]);



      $myviews = Bucket::where('roll',Auth::user()->rollno)->get();
      $user = User::get();
      $notifications = views::where('depmate',$roll)->where('read','1')->get();
      return redirect('/bucket') ;
    }
    public function view()
    {

      $images = Bucket::get();
      $currenttime = \Carbon\Carbon::now();
      foreach ($images as $image) {
        $image['finalcount'] = $image['totalcount'] - 1.5*($image['created_at']->diffInDays($currenttime));
        $image->save();
      }
        //to select 50 images and show them in 10 per page
      if($listid = request('id')){
        $images = Bucket::where('list', $listid)->orderBy('finalcount','DESC')->take(50)->paginate(5);
      }
      else{
        $images = Bucket::latest()->orderBy('finalcount','DESC')->take(50)->paginate(5);
        $listid = 0;
      }
      $currentpage=$images->currentPage();
      $perpage=$images->perPage();

      $user = User::get();
      $roll = Auth::user()->rollno;
      $id = Auth::user()->id; 

     $comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
          ->latest()->get();
      $notifications = views::where('depmate',$roll)->where('read','1')->get();
      $buckets = ['','SF Salsa','Old Archi Building','Graffitis','Howrah Bridge','Star Gazing','Twilight View','Treat','Bonfire','Little Sisters','Trek','Local Train','2.2', 'Explore KGP', 'Movie at Library', 'Lit Hall Day Host', 'How it Started!'];
      return view('bucket_view',compact('comment_notification','images','user','notifications','currentpage','perpage','buckets', 'listid'));
    }

    public function delete(){
      Bucket::where('pic', request('pic'))->delete();
      return response(" ", 200);
    }
}
