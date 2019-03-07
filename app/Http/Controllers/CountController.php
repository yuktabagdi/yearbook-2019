<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\likes;

use App\Comment;

use App\Image;

use App\User;

use App\views;



use DB;

class CountController extends Controller
{
    
    public function index1()
    {

        //to select 50 images and show them in 10 per page
        $images=Image::orderBy('totalcount','DESC')->take(50)->paginate(10);

        $currentpage=$images->currentPage();
        $perpage=$images->perPage();

        $user = User::get();
        $roll = Auth::user()->rollno;
        $id = Auth::user()->id;
        $notifications = views::where('depmate',$roll)->where('read','1')->latest()->get();
        $comment_notification = Comment::where('roll', $roll)->where('seen', '1')->where('user_id', '!=', $id)
        ->latest()->get();
        
        return view('trending',compact('images','user','notifications','currentpage','perpage', 'comment_notification'));
    }


    public function entry()
    {
        $users = User::get();
        
        for ($var=1500; $var < 1800; $var++) { 
            $users[$var]->password = bcrypt($users[$var]->dob);
            $users[$var]->save();
        }
        return redirect('/');
    }
     public function entry1()
    {
        $users = User::get();
        
        for ($var=1800; $var < 2100; $var++) { 
            $users[$var]->password = bcrypt($users[$var]->dob);
            $users[$var]->save();
        }
        return redirect('/');
    }
     public function entry2()
    {
        $users = User::get();
        
        for ($var=2100; $var < 2400; $var++) { 
            $users[$var]->password = bcrypt($users[$var]->dob);
            $users[$var]->save();
        }
        return redirect('/');
    }
     public function entry3()
    {
        $users = User::get();
        
        for ($var=2400; $var < 2700; $var++) { 
            $users[$var]->password = bcrypt($users[$var]->dob);
            $users[$var]->save();
        }
        return redirect('/');
    }

    public function delete(){
        Image::where('id', request('id'))->delete();
        return response(" ", 200);
    }
    
}
