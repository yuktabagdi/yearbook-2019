<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\writeup;
use App\User;
use App\views;
use App\likes;
use App\Comment;
use App\Image;



class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     /*
    -------------------------------------------------------
    function index()
    -------------------------------------------------------
        This function returns home.blade.php files which is
        the dashboard
        
    */
        public function index()
        {
          $user = User::get();
          $roll = Auth::user()->rollno;
          $notifications = views::where('depmate',$roll)->where('read','1')->get();
          return view('home',compact('user','notifications'));
        }

        public function index2()
        {
          $writeups = writeup::where('rollno',Auth::user()->rollno)->latest()->get();
        
          $roll = Auth::user()->rollno;
            //to select 50 images and show them in 10 per page
          $images=Image::where('rollno', $roll)->orderBy('totalcount','DESC')->take(50)->paginate(5);

          $currentpage=$images->currentPage();
          $perpage=$images->perPage();

          $user = User::get();
          $id = Auth::user()->id; 
          $notifications = views::where('depmate',$roll)->where('read','1')->get();
          $comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
          ->latest()->get();
          return view('home',compact('writeups','images','user','notifications','currentpage','perpage', 'comment_notification'));
        }
        
        public function search()
        {

          $name = request('search');
          $user = User::where('name',$name)->get();

          if( $user->isNotEmpty()){
            $roll = $user[0]['rollno']; 
            return redirect("/profile_index/".$roll);
          }
          else
            return back()->with('Error','Sorry, we cannot find your friend in our database');
        }

        /*
    -------------------------------------------------------
    function edit()
    -------------------------------------------------------
        This function returns edit the details of user
        
    */
        public function edit(Request $request)
        {

         $this->validate(request(),[

          'phone' => 'required|min:10|max:10',

        ]);
         $user = Auth::user();
         $user->email = request('email');
         $user->HOR = request('HOR');
         $user->course = request('course');
         $user->department = request('department');
         $user->phone = request('phone');
         $user->save();
         return back();


       }
     }

