<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\views;
use App\User;
use App\Comment;
use Auth;

class ViewsController extends Controller
{
    //


    public function approve(Request $request)
    {
        $data = array();

        $data['writeup'] = $request->query;

    }
    public function approval($id)
    {

        views::where('id', $id)
        ->update([

            'approval' => '1',
            'read' => '0',
        ]);
        $i = request('i');
        $data = '<button type="button" class="btn btn-danger disapprove app'.$i.'"  data-no="'.$i.'" data-id="'.json_encode($id).'" id= "'.json_encode(request('rollno')).'" >Disapprove</button>';
        return response($data, 200);

    }
    public function disapproval($id)
    {

        views::where('id', $id)
        ->update([

            'approval' => '0',
        ]);
        $i = request('i');
        $data = '<button type="button" class="btn btn-success approve app'.$i.'"  data-no="'.json_encode($i).'" data-id="'.json_encode($id).'" id= "'.json_encode(request('rollno')).'" );" >Approve</button> <div class="text_show'.$i.'" style= "padding-left: 15px;"></div>';
        return response($data, 200);

    }
    public function write($roll)
    {


        views::create([
            'depmate' => $roll,
            'views' => request('viewf'),
            'user' => Auth::user()->name,
            'approval' => '0',
            
        ]);


        // $mydata = User::where('rollno',$roll)->get();

        // $myviews = views::where('depmate',$roll)->get();
        

        
        return redirect('/profile_index/'.$roll) ;
    }
    public function write_public()
    {
        views::create([
            'depmate' => '19MT10011',
            'views' => 'cjsdjvcsbdjoj',
            'user' => 'Tanwir Singh',
            'approval' => '0',
            
        ]);
        return redirect('https://www.google.com/') ;
    }

    public function read($id)
    {
       $post = views::find($id);
        $post->read = 0;
        $post->save();
        return redirect('/profile_index') ;
    }
    public function readAll()
    {
        $roll = Auth::user()->rollno;
       $posts = views::where('depmate', $roll)->get();
       foreach($posts as $post){
        $post->read = 0;
        $post->save();
        }
        $comments = Comment::where('roll', $roll)->get();
        foreach ($comments as $comment) {
          $comment->seen = 0;
          $comment->save();
        }
    return redirect('/trending') ;
    }

}
