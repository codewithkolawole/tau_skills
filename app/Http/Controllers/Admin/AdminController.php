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

use SweetAlert;
use Alert;
use Carbon\Carbon;


use App\Models\Admin;
use App\Models\About;
use App\Models\Program;
use App\Models\Mission;

class AdminController extends Controller
{
    //

    public function index() {
        return view('admin.home');

    }

    

    public function about(){
        $about = About::first();
        return view('admin.about', [
            'about' => $about,
        ]);
    }

//----------------------------------------------------
    public function programManagement() {

        return view('admin.programManagement', [
        ]);
    }
    //----------------------------------------------------------


    public function addProgram(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'overview' => 'required|string',
            'curriculum' => 'required|string',
            'programcode' => 'required|string|max:255',
            'program_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', '$program_code')));
        $imageUrl = null;
        if($request->has('program_image')) {
            $imageUrl = 'uploads/programs/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/programs', $imageUrl);
        }

        // if ($request->hasFile('program_image')) {
        //     $image = $request->file('program_image');
        //     $name = time() . '.' . $image->getClientOriginalExtension();
        //     $destinationPath = public_path('/images/programs');
        //     $image->move($destinationPath, $name);
        //     $program->program_image = $name;
        // }
    
        $program->save();
    
        return redirect()->back()->with('success', 'Program details updated successfully.');
    }

//-------------------------------------------------------------------------------------------------
public function updateMission(Request $request){
    $validator = Validator::make($request->all(), [
        'image' => 'required',
        'mission_text' => 'required',
        'title' => 'required',

    ]);

    if ($validator->fails()) {
        alert()->error('Error', $validator->messages()->first())->persistent('Close');
        return redirect()->back();
    }

    $uuid = 'mission' . Carbon::now();

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
    $imageUrl = null;
    if($request->has('image')) {
        $imageUrl = 'uploads/mission/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/mission', $imageUrl);
    }

    // Find the existing about record or create a new one
    $mission = Mission::first();

    if (!$mission) {
        $mission = new Mission();
    }

    // Update the about statement
    $mission->image = $imageUrl;
    $mission->title = $request->title;
    $mission->mission_text = $request->mission_text;
    $mission->slug = $slug;



    if ($mission->save()) {
        alert()->success('Changes Saved', 'About Us updated successfully')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}





//--------------------------------------------------------------------------------------------

    //ABOUT UPDATE LOGIC
    public function updateAbout(Request $request){
        $validator = Validator::make($request->all(), [
            'image' => 'required',
            'about' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        $uuid = 'about' . Carbon::now();

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
        $imageUrl = null;
        if($request->has('image')) {
            $imageUrl = 'uploads/about/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/about', $imageUrl);
        }

        // Find the existing about record or create a new one
        $about = About::first();

        if (!$about) {
            $about = new About();
        }

        // Update the about statement
        $about->image = $imageUrl;
        $about->about = $request->about;
        $about->slug = $slug;



        if ($about->save()) {
            alert()->success('Changes Saved', 'About Us updated successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }


    //ADMIN VIEW LOGIC
    public function admins(){
        
        $admins = Admin::get();

        return view('admin.admins', [
            'admins' => $admins
        ]);
    }

//infomation 
    #We have a function called addAdmin that takes some information about a new admin from a form (name, email, role, password). Here's what the function does:

//1. First, it checks if all the required fields are filled in the form.
//2. If any field is missing, it shows an error message and asks the user to fill in all the fields.
//3. If all fields are filled, it takes the information and tries to create a new admin with it.
//4. It encrypts the password for security.
//5. If the new admin is created successfully, it shows a success message saying the admin was added successfully.
//6. If there is any problem creating the new admin, it shows an error message saying something went wrong.
//7. Finally, it redirects the user back to the previous page.


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


    //ADMIN UPDATE LOGIC
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

        $mission = Mission::get();

        return view('admin.mission', [
            'mission' => $mission
        ]);
    }
    
    public function vision(){

        return view('admin.vision');
    }

    public function gallery(){

        return view('admin.gallery');
    }

    public function contact(){

        return view('admin.contact');
    }

    public function studentFeedbacks(){

        return view('admin.studentFeedbacks');
    }

    public function apply(){

        return view('admin.apply');
    }


    public function instructor(){

        return view('admin.instructor');
    }



}

