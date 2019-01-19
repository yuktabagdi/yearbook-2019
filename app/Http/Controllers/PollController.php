<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\views;
use App\User;
use App\Comment;
use App\Poll;

class PollController extends Controller
{
    //
    public function index(){
    	$id = Auth::user()->id;
    	$roll = Auth::user()->rollno;
    	$user = User::get();
    	$polls = Poll::where('rollno',$roll)->get()->toArray();
    	if(!empty($polls))
      		$polls = $polls[0];
    	$notifications = views::where('depmate',$roll)->where('read','1')->latest()->get();
    	$comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
        ->latest()->get();
    	return view('polls',compact('notifications','comment_notification','user','polls'));
    }
    public function post($id){
    	$roll = Auth::user()->rollno;
   		if(empty(Poll::where('rollno',$roll)->get()->toArray())){
     		Poll::create([
     			'rollno' =>Auth::user()->rollno,
      			'q'.$id => request('q'.$id),
    		]);
   		}
   		else{
     		Poll::where('rollno', $roll)->update([
       			'q'.$id => request('q'.$id),
     		]);
   		}
   		return back();
    }
}
