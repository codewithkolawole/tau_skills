<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index() {
        return view('admin.home');

    }

    public function about(){

        return view('admin.about');
    }

    public function admins(){

        return view('admin.admins');
    }

    public function history(){

        return view('admin.history');
    }

    public function mission(){

        return view('admin.mission');
    }
    
    public function vision(){

        return view('admin.vision');
    }

    public function campus(){

        return view('admin.campus');
    }

    public function project(){

        return view('admin.project');
    }

    public function gallery(){

        return view('admin.gallery');
    }

    public function contact(){

        return view('admin.contact');
    }

    public function feedback(){

        return view('admin.feedback');
    }

    public function apply(){

        return view('admin.apply');
    }

    public function programManagement(){

        return view('admin.programManagement');
    }

    public function certificateManagement(){

        return view('admin.certificateManagement');
    }

    public function students(){

        return view('admin.students');
    }

    public function instructor(){

        return view('admin.instructor');
    }

    public function admission(){

        return view('admin.admission');
    }


}

