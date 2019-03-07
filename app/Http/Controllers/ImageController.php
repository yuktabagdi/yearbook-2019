<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Auth;
use Response;
use App\User;
use App\views;
use Intervention\Image\Facades\Image as Image1;
class ImageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index1()
	{
		$images = Image::where('rollno',Auth::user()->rollno)->latest()->get()->toArray();	
		$user = User::get();
		$roll = Auth::user()->rollno;
		$notifications = views::where('depmate',$roll)->where('read','1')->latest()->get();

		return view('upload',compact('images','user','notifications'));
	}
	
	public function upload1(Request $request)
	{
				$user = Auth::user();
		
		if($request->hasFile('image')) {
			$file = $request->file('image');
			$file_original = $request->file('image');
			//print_r($file);
			$this->validate($request, [
				'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
				'classifier' => 'required'
			]);
           //you also need to keep file extension as well
			$classifier = request('classifier');
			$name = $user->rollno.'_'.$classifier.'_'.time().'.'.$file_original->getClientOriginalExtension();
           //using array instead of object
			$image['filePath'] = $name;
			$file->move(public_path().'/uploads/', $name);
			$width = Image1::make('uploads/'.$name)->width();
			if($width < 1000)
				$thumbnail = Image1::make('uploads/'.$name)->resize($width, 300);
			else
				$thumbnail = Image1::make('uploads/'.$name)->resize(1000, 300);
			$target = public_path('/thumbnails/'.$name);
			$thumbnail->save($target);
			if(!empty(request('caption')))
				$caption = request('caption');
			else
				$caption = '';
			Image::create([
				
				'url' => 'uploads/'.$name,
				'rollno' => $user->rollno,
				'caption' => $caption,
				'classifier' => $classifier,
				'thumbnail' => 'thumbnails/'.$name,
			]);
			$response = '<div class="post"><img src="'.request('url').'" id="'.Image::get()->count().'"><br>
			<br><strong>'.request('caption').'</strong></div>`';
			return response($response,200);
			
		}
		else
		{
			$response = "Not Uploaded";
			return response($response,404);
		}
		
	}
	public function get(){
		$image = Image::where('id', request('pic_id'))->get();
		$response = array(
			'rollno' => $image[0]['rollno'],
			'created_at' => $image[0]->created_at->diffForHumans(),
			'name' => User::where('rollno', $image[0]['rollno'])->value('name'),
			'pic' => User::where('rollno', $image[0]['rollno'])->value('pro_pic'),
		);
		return response($response,200);
	}	
}