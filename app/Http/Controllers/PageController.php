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

class PageController extends Controller
{
    //
    public function contact(){

        return view('contact', [

        ]);
    }

    public function about(){
        
        return view('about', [

        ]);
    }

    public function gallery(){
        
        $gallery = Gallery::all();
        return view('gallery', [
            'gallery' => $gallery
        ]);
    }

    public function program(){
        
        $program = Program::all();
        return view('program', [
            'program' => $program
        ]);
    }

}
