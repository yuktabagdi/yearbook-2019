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
     $myviews = Bucket::where('roll',Auth::user()->rollno)->get();
     $user = User::get();
     $roll = Auth::user()->rollno;
     
     $notifications = views::where('depmate',$roll)->where('read','1')->get()->toArray();
     return view('bucket_index',compact('myviews','notifications','user'));
    }


    public function comment($id)
    {
      $file = request('fileToUpload');
      $user = Auth::user();
      $name = $user->rollno.'_bucket_list_'.$id.'_'.time().'.'.$file->getClientOriginalExtension();


      $file->move(public_path(), $name);
      $roll = Auth::user()->rollno;
      Bucket::create([
        'roll' => $roll,
        'list' => $id,
        'pic' => $name,
        'totalcount' => '0',
        'finalcount' => '0'
      ]);



      $myviews = Bucket::where('roll',Auth::user()->rollno)->get();
      $user = User::get();


      $notifications = views::where('depmate',$roll)->where('read','1')->get()->toArray();
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
      $images=Bucket::orderBy('finalcount','DESC')->take(50)->paginate(5);

            //$images = $image->sortBy('totalcount');
            //dd($images);
      $currentpage=$images->currentPage();
      $perpage=$images->perPage();

      $user = User::get();
      $roll = Auth::user()->rollno;
      $id = Auth::user()->id; 

     $comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
          ->latest()->get()->toArray();
      $notifications = views::where('depmate',$roll)->where('read','1')->get();
      $buckets = ['','SF Salsa','Old Archi Building','Graffitis','Howrah Bridges','>Star Gazing','Twilight View','Treat','Bonfire','Little Sisters','Trek','Local Train','2.2'];
      return view('bucket_view',compact('comment_notification','images','user','notifications','currentpage','perpage','buckets'));
    }
    public function view1()
    {

      $images = Bucket::get();
      $currenttime = \Carbon\Carbon::now();
      foreach ($images as $image) {
        $image['finalcount'] = $image['totalcount'] - 1.5*($image['created_at']->diffInDays($currenttime));
        $image->save();
      }
        //to select 50 images and show them in 10 per page
      $images=Bucket::orderBy('finalcount','DESC')->take(50)->paginate(5);

            //$images = $image->sortBy('totalcount');
            //dd($images);
      $currentpage=$images->currentPage();
      $perpage=$images->perPage();

      $user = User::get();
      $roll = Auth::user()->rollno;
      $id = Auth::user()->id; 

     $comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
          ->latest()->get()->toArray();
      $notifications = views::where('depmate',$roll)->where('read','1')->get();
      $buckets = ['','SF Salsa','Old Archi Building','Graffitis','Howrah Bridges','>Star Gazing','Twilight View','Treat','Bonfire','Little Sisters','Trek','Local Train','2.2'];
      return view('bucket_view1',compact('comment_notification','images','user','notifications','currentpage','perpage','buckets'));
    }
}
