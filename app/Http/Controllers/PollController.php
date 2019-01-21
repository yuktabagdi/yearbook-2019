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
    
    public function result()
    {
      $users = User::get();
      $res = Poll::get();

      $box1 = array();$box2 = array();$box3 = array();$box4 = array();$box5 = array();

      $res1 = array();$res2 = array();$res3 = array();$res4 = array();$res5 = array();

      foreach ($res as $entries) {
        
        if(!empty($entries['q1']))
        {
          $roll =User::where('name',$entries['q1'])->get()->toArray(); 
          $roll = $roll[0]['rollno'];
          array_push($box1, $roll);
        }

        if(!empty($entries['q2']))
        {
          $roll =User::where('name',$entries['q2'])->get()->toArray(); 
          $roll = $roll[0]['rollno'];
          array_push($box2, $roll);

        }

        if(!empty($entries['q3']))
        {
          $roll =User::where('name',$entries['q3'])->get()->toArray(); 
          $roll = $roll[0]['rollno'];
          array_push($box3, $roll);
          
        }

        if(!empty($entries['q4']))
        {
          $roll =User::where('name',$entries['q4'])->get()->toArray(); 
          $roll = $roll[0]['rollno'];
          array_push($box4, $roll);          
        }


        if(!empty($entries['q5']))
        {
          $roll =User::where('name',$entries['q5'])->get()->toArray(); 
          $roll = $roll[0]['rollno'];
          array_push($box5, $roll);          
        }        
      }

      //1
      foreach ($box1 as $v) {
        $res1[$v]=0;
      }

      foreach ($box1 as $v) {
        $res1[$v]+=1;
      }
      arsort($res1);
      
      //2
      foreach ($box2 as $x) {
        $res2[$x]=0;
      }
      foreach ($box2 as $x) {
        $res2[$x]+=1;
      }
      arsort($res2);
      //3
      foreach ($box3 as $x) {
        $res3[$x]=0;
      }
      foreach ($box3 as $x) {
        $res3[$x]+=1;
      }
      arsort($res3);
      //4
      foreach ($box4 as $x) {
        $res4[$x]=0;
      }
      foreach ($box4 as $x) {
        $res4[$x]+=1;
      }
      arsort($res4);
      //5
      foreach ($box5 as $x) {
        $res5[$x]=0;
      }
      foreach ($box5 as $x) {
        $res5[$x]+=1;
      }
      arsort($res5);

      return view('test',compact('res','users','box1','res1','res2','res3','res4','res5'));
    }

    public function plot($id)
    {
      $polls = Poll::get();
      $box = array();
      $res = array();

      
      foreach ($polls as $entries) {
        if(!empty($entries['q'.$id]))
        {
          $roll =User::where('name',$entries['q'.$id])->get()->toArray(); 
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

      return view('sample',compact('res'));

    }
}
