<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
      for ($x = 1; $x <= 5; $x++) {
        $res[$x] = PollController::plot($x);        
      }
      
    	if(!empty($polls))
      		$polls = $polls[0];
    	$notifications = views::where('depmate',$roll)->where('read','1')->latest()->get();
    	$comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
        ->latest()->get();
    	return view('polls',compact('notifications','comment_notification','user','polls','res'));
    }
    public function post($id){
    	$roll = Auth::user()->rollno;
      if (empty(User::where('name',strtok(request('q'.$id), "|"))->get()->toArray())) {
        $e = array($id,"Please Enter Correct name");
        $f = "$id";
        return Redirect::back()->withErrors($e);
      }
      if(empty(Poll::where('rollno',$roll)->get()->toArray())){
     		Poll::create([
     			'rollno' =>Auth::user()->rollno,
      			'q'.$id => strtok(request('q'.$id), "|"),
    		]);
   		}
   		else{
     		Poll::where('rollno', $roll)->update([
       			'q'.$id => strtok(request('q'.$id), "|"),
     		]);
   		}
      
   		return back();
    }
    
    public function plot($id)
    {
      $polls = Poll::get();
      $box = array();
      $res = array();

      
      foreach ($polls as $entries) {
        if(!empty($entries['q'.$id]))
        {
          $roll = User::where('name',$entries['q'.$id])->get()->toArray();
          $roll = $roll[0]['rollno'];
          array_push($box, $roll);
        }

      }

      foreach ($box as $x) {
        $res[$x]=0;
      }
      foreach ($box as $x) {
        $res[$x]+=1;
      }
      arsort($res);
      $res = array_slice($res,0,5);
      return $res;

    }
}
