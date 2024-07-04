<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use SweetAlert;
use Alert;
use Carbon\Carbon;


use App\Models\Admin;
use App\Models\About;
use App\Models\Program;
use App\Models\Mission;
use App\Models\History;
use App\Models\StudentFeedback;
use App\Models\Value;
use App\Models\Gallery;
use App\Models\Instructor;
use App\Models\ContactUs;

class PageController extends Controller
{
    //
    public function contact(){
        $contact = ContactUs::first();
        return view('contact', [
          'contact' => $contact,
        ]);
    }

    public function about(){
        $about = About::first();
        $history = History::first();
        $missions = Mission::first();
        $values = Value::first();
        return view('about', [
            'about' => $about,
            'history' => $history,
            'missions' =>$missions,
            'values' =>$values,
        ]);
    }

    public function gallery(){
        
        $gallery = Gallery::all();
        return view('gallery', [
            'gallery' => $gallery
        ]);
    }

    public function courses(){
        $courses = Program::all();
        return view('program', [
            'courses' => $courses
        ]);
    }

    public function viewProgram($slug){
        $program = Program::where('slug', $slug)->firstOrFail();
        $feedback = StudentFeedback::all();
        $contact = ContactUs::first();
        return view('viewProgram', [
            'program' => $program,
            'feedback' => $feedback,
            'contact' => $contact
        ]);
    }


}
