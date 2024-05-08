<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use App\Models\Admin;

class AdminController extends Controller
{
    //

    public function index() {
        return view('admin.home');

    }

    public function about(){

        return view('admin.about');
    }

    //ADMIN VIEW LOGIC
    public function admins(){
        
        $admins = Admin::get();

        return view('admin.admins', [
            'admins' => $admins
        ]);
    }

    //ADMIN CREATE LOGIC
    public function addAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }
        
        $password = $request->password;

        $newAdmin = ([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($password),
        ]);

        if(Admin::create($newAdmin)){
            alert()->success('Admin Added successfully', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
        
    }


    //ADMIN CREATE LOGIC
    public function updateAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'admin_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$admin = Admin::find($request->admin_id)){
            alert()->error('Oops', 'Invalid Admin')->persistent('Close');
            return redirect()->back();
        }


        if(!empty($request->name) &&  $request->name != $admin->name){
            $admin->name = $request->name;
        }

        if(!empty($request->email) &&  $request->email != $admin->email){
            $admin->email = $request->email;
        }

        if(!empty($request->role) &&  $request->role != $admin->role){
            $admin->role = $request->role;
        }

        if(!empty($request->password) &&  $request->password != $admin->password){
            $admin->password = bcrypt($request->password);
        }

        if($admin->save()){
            alert()->success('Changes Saved', 'Admin changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }


    //ADMIN DELETION LOGIC
    public function deleteAdmin(Request $request){

        $validator = Validator::make($request->all(), [
            'admin_id' => 'required|min:1',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$admin = Admin::find($request->admin_id)){
            alert()->error('Oops', 'Invalid Admin')->persistent('Close');
            return redirect()->back();
        }

        if($admin->delete()){
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
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

