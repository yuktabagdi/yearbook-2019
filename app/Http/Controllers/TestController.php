<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function testimonial(){
        return view("auth.nonGradTestimonials");
    }
    
    public function testimonialpost(Request $request){
        $name = $request->input("name");
        echo $name;
        $rollno = $request->input("rollno");
        echo $rollno;
        $testimonial = $request->input("testimonial-non-grad");
        echo $testimonial;

    }
}
