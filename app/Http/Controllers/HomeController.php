<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use SweetAlert;
use Alert;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Program;
use App\Models\StudentFeedback;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Instructor;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {   
        $about = About::first();
        $courses = Program::all();
        $sliders = Slider::all();
        $gallery = Gallery::all();
        $feedbacks = StudentFeedback::all();
        $instructor = Instructor::all();

        return view('welcome',[
            'sliders' => $sliders,
            'courses' => $courses,
            'feedbacks'=>$feedbacks,
            'about'=> $about,
            'gallery' => $gallery,
            'instructor' =>$instructor,
        ]);
    }

}
