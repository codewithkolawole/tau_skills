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
use App\Models\History;
use App\Models\StudentFeedback;
use App\Models\Value;
use App\Models\Gallery;
use App\Models\Instructor;
use App\Models\ContactUs;
use App\Models\Setting;



class AdminController extends Controller
{
    //

    public function index() {
        return view('admin.home');

    }


    public function siteGlobalSetting (){
        $setting = Setting::first();
        return view('admin.siteGlobalSetting', [
            'setting' => $setting,
        ]);
    }

    public function updateSiteGlobalSetting(Request $request){
        $validator = Validator::make($request->all(), [
            'header_logo' => 'nullable|image',
            'footer_logo' => 'nullable|image',
            'description' => 'nullable',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $setting = Setting::first(); 
        if (!$setting) {
            $setting = new Setting; 
        }

        if ($request->hasFile('header_logo')) {
            $imageUrl = 'uploads/setting/' . 'header_logo' .'.' . $request->file('header_logo')->getClientOriginalExtension();
            $image = $request->file('header_logo')->move('uploads/setting', $imageUrl);
            $setting->header_logo = $imageUrl;
        }

        if ($request->hasFile('footer_logo')) {
            $imageUrl = 'uploads/setting/' . 'footer_logo' . '.' . $request->file('footer_logo')->getClientOriginalExtension();
            $image = $request->file('footer_logo')->move('uploads/setting', $imageUrl);
            $setting->footer_logo = $imageUrl;
        }

        if ($request->hasFile('banner')) {
            $imageUrl = 'uploads/setting/' . 'banner' . '.' . $request->file('banner')->getClientOriginalExtension();
            $image = $request->file('banner')->move('uploads/setting', $imageUrl);
            $setting->banner = $imageUrl;
        }


        if(!empty($request->description)){
            $description = $request->description;
            $setting->description = $description;
        }

        if (!empty($request->phone_number)) {
            $phone_number = $request->phone_number;
            $setting->phone_number = $phone_number;
        }
        
        if (!empty($request->email)) {
            $email = $request->email;
            $setting->email = $email;
        }
        
        if (!empty($request->address)) {
            $address = $request->address;
            $setting->address = $address;
        }
        
        if (!empty($request->facebook)) {
            $facebook = $request->facebook;
            $setting->facebook = $facebook;
        }
        
        if (!empty($request->twitter)) {
            $twitter = $request->twitter;
            $setting->twitter = $twitter;
        }
        
        if (!empty($request->instagram)) {
            $instagram = $request->instagram;
            $setting->instagram = $instagram;
        }
        
        if (!empty($request->linkedin)) {
            $linkedin = $request->linkedin;
            $setting->linkedin = $linkedin;
        }

        if($setting->save()){
            alert()->success('Changes Saved', 'Site Setting changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }
    

    public function about(){
        $about = About::first();
        return view('admin.about', [
            'about' => $about,
        ]);
    }

//----------------------------------------------------
    public function programManagement() {

        $programs = Program::get();
        return view('admin.programManagement', [
            'programs' => $programs
        ]);
    }
//------------------------------add mission-------------------------------------------------------------------
public function addMission(Request $request){
    $validator = Validator::make($request->all(), [
        'image' => 'sometimes',
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

    $newMission = ([
        'image' => $imageUrl,
        'mission_text' => $request->mission_text,
        'title' => $request->title,
        'slug' =>$slug,
    ]);


    if(Mission::create($newMission)){
        alert()->success('Mission Added successfully', '')->persistent('Close');
        return redirect()->back();
    }


    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}





//--------------------------------------------------------------------------------------------

    //ABOUT UPDATE LOGIC
    public function updateAbout(Request $request) {
    
        $uuid = 'about' . Carbon::now();
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
    
        $imageUrl = null;
        if ($request->has('image')) {
            $imageUrl = 'uploads/about/' . $slug . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/about', $imageUrl);
        }
    
        $historyImageUrl = null;
        if ($request->has('history_image')) {
            $historyImageUrl = 'uploads/about/history_' . $slug . '.' . $request->file('history_image')->getClientOriginalExtension();
            $request->file('history_image')->move('uploads/about', $historyImageUrl);
        }

        $tourImageUrl = null;
        if ($request->has('tour_image')) {
            $tourImageUrl = 'uploads/about/tour_' . $slug . '.' . $request->file('tour_image')->getClientOriginalExtension();
            $request->file('tour_image')->move('uploads/about', $tourImageUrl);
        }
    
        // Find the existing about record or create a new one
        $about = About::first();
    
        if (!$about) {
            $about = new About();
        }
    
        // Update the about statement
        if(!empty($request->image)){
            $about->image = $imageUrl;
        }
        if(!empty($request->tour_image)){
            $about->tour_image = $tourImageUrl;
        }
        if(!empty($request->history_image)){
            $about->history_image = $historyImageUrl;
        }
        if(!empty($request->tour_link)){
            $about->tour_link = $request->tour_link;
        }
        if(!empty($request->history)){
            $about->history = $request->history;
        }
        if(!empty($request->tour_description)){
            $about->tour_description = $request->tour_description;
        }
        if(!empty($request->about)){
            $about->about = $request->about;
        }

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


//----------------------------------------add -mission --------


//----------------------------------------edit mission --------

public function editMission(Request $request){
    $validator = Validator::make($request->all(), [
        'mission_id' => 'required',
    ]);
    
    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$mission = Mission::find($request->mission_id)){
        alert()->error('Oops', 'Invalid Mission')->persistent('Close');
        return redirect()->back();
    }


    if(!empty($request->mission_text) &&  $request->mission_text != $mission->mission_text){
        $mission->mission_text = $request->mission_text;
    }

    if(!empty($request->title) &&  $request->title != $mission->title){
        $mission->title = $request->title;
    }

    if(!empty($request->image) &&  $request->image != $mission->image){
        $mission->image = $request->image;
    }

    if($mission->save()){
        alert()->success('Changes Saved', 'Mission changes saved successfully')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}
//-------------------------------delete mission--------------------------------

public function deleteMission(Request $request){
    $validator = Validator::make($request->all(), [
        'mission_id' => 'required',
    ]);

    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$mission = Mission::find($request->mission_id)){
        alert()->error('Oops', 'Invalid mission')->persistent('Close');
        return redirect()->back();
    }


    if(!empty($request->mission_text) &&  $request->mission_text != $mission->mission_text){
        $mission->mission_text = $request->mission_text;
    }

    if(!empty($request->title) &&  $request->title != $mission->title){
        $mission->title = $request->title;
    }

    if(!empty($request->image) &&  $request->image != $mission->image){
        $mission->image = $request->image;
    }

    if($mission->delete()){
        alert()->success('Changes Saved', 'Mission changes saved successfully')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}
 //----------------edit  feedback--------------------------------
    public function editFeedback(Request $request){
        $validator = Validator::make($request->all(), [
            'feedback_id' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$feedback = StudentFeedback::find($request->feedback_id)){
            alert()->error('Oops', 'Invalid Admin')->persistent('Close');
            return redirect()->back();
        }


        if(!empty($request->name) &&  $request->name != $feedback->name){
            $feedback->name = $request->name;
        }
    
        if(!empty($request->image) &&  $request->image != $feedback->image){
            $feedback->image = $request->image;
        }

        
        if(!empty($request->title) &&  $request->title != $feedback->title){
            $feedback->title = $request->title;
        }
    
        if(!empty($request->feedback) &&  $request->feedback != $feedback->feedback){
            $feedback->feedback = $request->feedback;
        }

        if($feedback->save()){
            alert()->success('Changes Saved', 'Feedback changes saved successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    //--------------------------------------------------delete
    //---------------history--------------
    public function updateHistory(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required|min:1',
            'history_text'=> 'required',
            'title'=> 'required',
            'slug' => 'slug'
        ]);
        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $uuid = 'history' . Carbon::now();

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
        $imageUrl = null;
        if($request->has('image')) {
            $imageUrl = 'uploads/history/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
            $image = $request->file('image')->move('uploads/history', $imageUrl);
        }
        
        $history =History::first();

        if (!$history) {
            $history = new History();
        }

        // Update the about statement
        $history->image = $imageUrl;
        $history -> title =$request ->title;
        $history->history_text = $request->history_text;
        $history->slug = $slug;



        if ($history->save()) {
            alert()->success('Changes Saved', 'History updated successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
        }



//--------------------------------------------
public function updateContact(Request $request){

    $validator = Validator::make($request->all(), [
        'image' => 'required|min:1',
        'address'=> 'required',
        'email'=> 'required',
        'phone'=> 'required',
        'banner' => 'required',
        'slug' => 'slug'
    ]);
    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    $uuid = 'setting' . Carbon::now();

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
    $imageUrl = null;
    if($request->has('image')) {
        $imageUrl = 'uploads/setting/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/setting', $imageUrl);
    }

    $bannerUrl = null;
    if ($request->has('banner')) {
    $bannerUrl = 'uploads/setting/banner_' . $slug . '.' . $request->file('banner')->getClientOriginalExtension();
    $request->file('banner')->move('uploads/setting', $bannerUrl);}
    
    $setting =ContactUs::first();

    if (!$setting) {
        $setting = new ContactUs();
    }

    // Update the about statement
    $setting->image = $imageUrl;
    $setting -> address =$request ->address;
    $setting->email = $request->email;
    $setting -> phone =$request ->phone;
    $setting->slug = $slug;
    if ($bannerUrl) {
        $setting->banner = $bannerUrl;
    }



    if ($setting->save()) {
        alert()->success('Changes Saved', 'Contact Us updated successfully')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
    }


//---------------feedback--------------
public function addFeedback(Request $request){

    $validator = Validator::make($request->all(), [
        'image' => 'required',
        'feedback'=> 'required',
        'name'=> 'required',
        'title'=> 'required',
    ]);
    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    $uuid = 'student_feedback' . Carbon::now();

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
    $imageUrl = null;
    if($request->has('image')) {
        $imageUrl = 'uploads/feedback/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/feedback', $imageUrl);
    }
    
    $newFeedback = ([
        'image' => $imageUrl,
        'feedback' => $request->feedback,
        'title' => $request->title,
        'name'=>$request-> name,
        'slug' =>$slug,
    ]);


    if(StudentFeedback::create($newFeedback)){
        alert()->success('Feedback Added successfully', '')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();

    }

    //---------------------------------------------------------------------------------------
    public function deleteFeedback(Request $request) {
        $validator = Validator::make($request->all(), [
            'feedback_id' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$feedback = StudentFeedback::find($request->feedback_id)){
            alert()->error('Oops', 'Invalid Admin')->persistent('Close');
            return redirect()->back();
        }

        if($feedback->delete()){
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();

    }

    



    //------------------------------add Vision-------------------------------------------------------------------
public function addVision(Request $request){
    $validator = Validator::make($request->all(), [
        'image' => 'sometimes',
        'value_text' => 'required',
        'title' => 'required',

    ]);

    if ($validator->fails()) {
        alert()->error('Error', $validator->messages()->first())->persistent('Close');
        return redirect()->back();
    }

    $uuid = 'value' . Carbon::now();

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
    $imageUrl = null;
    if($request->has('image')) {
        $imageUrl = 'uploads/value/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/value', $imageUrl);
    }
    
    $newVision = ([
        'image' => $imageUrl,
        'title' => $request->title,
        'value_text'=>$request-> value_text,
        'slug' =>$slug,
    ]);
    // Find the existing about record or create a new one
    if(Value::create($newVision)){
        alert()->success('Vision Added successfully', '')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}

  //------------------------------edit Vision-------------------------------------------------------------------
  public function editVision(Request $request){
    $validator = Validator::make($request->all(), [
        'value_id' => 'required',
    ]);

    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$value = Value::find($request->value_id)){
        alert()->error('Oops', 'Invalid value')->persistent('Close');
        return redirect()->back();
    }

    if(!empty($request->image) &&  $request->image != $value->image){
        $value->image = $request->image;
    }

    
    if(!empty($request->title) &&  $request->title != $value->title){
        $value->title = $request->title;
    }

    if(!empty($request->value_text) &&  $request->value_text != $value->value_text){
        $value->value_text = $request->value_text;
    }

    if($value->save()){
        alert()->success('Changes Saved', 'value changes saved successfully')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}
//--------------------------------------------------------------------



//---------------feedback--------------
public function addGallery(Request $request){

    $validator = Validator::make($request->all(), [
        'image' => 'required',
        'title'=> 'required',
        'banner' => 'required',
        'slug' => 'slug',
    ]);
    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    $uuid = 'gallery' . Carbon::now();

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
    $imageUrl = null;
    if($request->has('image')) {
        $imageUrl = 'uploads/gallery/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/gallery', $imageUrl);
    }
    
    $bannerUrl = null;
    if ($request->has('banner')) {
        $bannerUrl = 'uploads/gallery/banner_' . $slug . '.' . $request->file('banner')->getClientOriginalExtension();
        $request->file('banner')->move('uploads/gallery', $bannerUrl);
    }

    $newGallery = ([
        'image' => $imageUrl,
        'title' => $request->title,
        'slug' =>$slug,
        "banner" =>$bannerUrl,
    ]);


    if(Gallery::create($newGallery)){
        alert()->success('Gallery Added successfully', '')->persistent('Close');
        return redirect()->back();
    }
   

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();

    }

    //---------------------------------------------------------------------------------------
    public function deleteGallery(Request $request) {
        $validator = Validator::make($request->all(), [
            'gallery_id' => 'required',
        ]);

        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        if(!$gallery = Gallery::find($request->gallery_id)){
            alert()->error('Oops', 'Invalid Admin')->persistent('Close');
            return redirect()->back();
        }

        if($gallery->delete()){
            alert()->success('Record Deleted', '')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();

    }


    public function editGallery(Request $request){
        $validator = Validator::make($request->all(), [
            'gallery_id' => 'required|exists:galleries,id',
            'image' => 'nullable|image',
            'title' => 'required|string|max:255',
        ]);
    
        if($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }
    
        if(!$gallery = Gallery::find($request->gallery_id)){
            alert()->error('Oops', 'Invalid value')->persistent('Close');
            return redirect()->back();
        }
    
        if(!empty($request->image) &&  $request->image != $gallery->image){
            $gallery->image = $request->image;
        }
    
        
        if(!empty($request->title) &&  $request->title != $gallery->title){
            $gallery->title = $request->title;
        }

        if($gallery->save()){
            alert()->success('Changes Saved', 'value changes saved successfully')->persistent('Close');
            return redirect()->back();
        }
    
        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }



//--------------------------------------delete visison    
public function deleteVision(Request $request) {
    $validator = Validator::make($request->all(), [
        'value_id' => 'required',
    ]);

    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$value = Value::find($request->value_id)){
        alert()->error('Oops', 'Invalid  Value')->persistent('Close');
        return redirect()->back();
    }

    
    if(!empty($request->image) &&  $request->image != $value->image){
        $value->image = $request->image;
    }

    
    if(!empty($request->title) &&  $request->title != $value->title){
        $value->title = $request->title;
    }

    if(!empty($request->value) &&  $request->value != $value->value_text){
        $value->value_text = $request->value_text;
    }


    if($value->delete()){
        alert()->success('Record Deleted', '')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();

}

//-----------------------------------------------------------------------------------------------------


//-------------------program--------------------------------------------------------------------
public function deleteProgram(Request $request) {
    $validator = Validator::make($request->all(), [
        'program_id' => 'required',
    ]);

    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$program = Program::find($request->program_id)){
        alert()->error('Oops', 'Invalid Admin')->persistent('Close');
        return redirect()->back();
    }

    if(!empty($request->programcode) &&  $request->programcode != $program->programcode){
        $program->programcode = $request->programcode;
    }

    if(!empty($request->title) &&  $request->title != $program->title){
        $program->title = $request->title;
    }

    if(!empty($request->program_image) &&  $request->program_image != $program->program_image){
        $program->program_image = $request->program_image;
    }

    if(!empty($request->overview) &&  $request->title != $program->overview){
        $program->overview = $request->overview;
    }

    if(!empty($request->curriculum) &&  $request->curriculum != $program->curriculum){
        $program->curriculum = $request->curriculum;
    }

    if($program->delete()){
        alert()->success('Record Deleted', '')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();

}


public function editProgram(Request $request){
    $validator = Validator::make($request->all(), [
        'program_id' => 'required',
    ]);

    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$program = Program::find($request->program_id)){
        alert()->error('Oops', 'Invalid value')->persistent('Close');
        return redirect()->back();
    }

    if(!empty($request->program_image) &&  $request->program_image != $program->program_image){
        $program->program_image = $request->program_image;
    }
    if(!empty($request->overview) &&  $request->overview != $program->overview){
        $program->overview = $request->overview;
    }
    if(!empty($request->programcode) &&  $request->programcode != $program->programcode){
        $program->programcode = $request->programcode;
    }

    if(!empty($request->curriculum) &&  $request->curriculum != $program->curriculum){
        $program->curriculum = $request->curriculum;
    }
    
    if(!empty($request->title) &&  $request->title != $program->title){
        $program->title = $request->title;
    }

    if($program->save()){
        alert()->success('Changes Saved', 'program changes saved successfully')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}

 
public function addProgram(Request $request)
{
    $validator = Validator::make($request->all(), [
        'program_image' => 'required|image',
        'title'=> 'required|string',
        'overview'=> 'required|string',
        'curriculum'=> 'required|string',
        'programcode'=> 'required|string',
    ]);

    if ($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    $uuid = 'program' . Carbon::now()->format('YmdHis');
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));

    $imageUrl = null;
    if ($request->hasFile('program_image')) {
        $image = $request->file('program_image');
        $imageUrl = 'uploads/program/' . $slug . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/program'), $imageUrl);
    }

    $newProgram = [
        'program_image' => $imageUrl,
        'overview' => $request->overview,
        'curriculum' => $request->curriculum,
        'title' => $request->title,
        'programcode' => $request->programcode,
        'slug' => $slug,
    ];

    if (Program::create($newProgram)) {
        alert()->success('Program Added successfully', '')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}



//----------------------------------------------------------------------------------------------------------

public function deleteInstructor(Request $request) {
    $validator = Validator::make($request->all(), [
        'instructor_id' => 'required',
    ]);

    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$instructor = Instructor::find($request->instructor_id)){
        alert()->error('Oops', 'Invalid Admin')->persistent('Close');
        return redirect()->back();
    }

    if(!empty($request->image) &&  $request->image != $instructor->image){
        $instructor->image = $request->image;
    }

    if(!empty($request->name) &&  $request->name != $instructor->name){
        $instructor->name = $request->name;
    }

    if(!empty($request->portfolio) &&  $request->portfolio != $instructor->portfolio){
        $instructor->portfolio = $request->portfolio;
    }

    if(!empty($request->email) &&  $request->email != $instructor->email){
        $instructor->email = $request->email;
    }

    if(!empty($request->phone) &&  $request->phone != $instructor->phone){
        $instructor->phone = $request->phone;
    }

    if($instructor->delete()){
        alert()->success('Record Deleted', '')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();

}


public function editInstructor(Request $request){
    $validator = Validator::make($request->all(), [
        'instructor_id' => 'required',
    ]);

    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    if(!$instructor = Instructor::find($request->instructor_id)){
        alert()->error('Oops', 'Invalid value')->persistent('Close');
        return redirect()->back();
    }

    if(!empty($request->image) &&  $request->image != $instructor->image){
        $instructor->image = $request->image;
    }

    if(!empty($request->name) &&  $request->name != $instructor->name){
        $instructor->name = $request->name;
    }

    if(!empty($request->portfolio) &&  $request->portfolio != $instructor->portfolio){
        $instructor->portfolio = $request->portfolio;
    }

    if(!empty($request->email) &&  $request->email != $instructor->email){
        $instructor->email = $request->email;
    }

    if(!empty($request->phone) &&  $request->phone != $instructor->phone){
        $instructor->phone = $request->phone;
    }

    if($instructor->save()){
        alert()->success('Changes Saved', 'instructor changes saved successfully')->persistent('Close');
        return redirect()->back();
    }

    alert()->error('Oops!', 'Something went wrong')->persistent('Close');
    return redirect()->back();
}

 
public function addInstructor(Request $request){

    $validator = Validator::make($request->all(), [
        'image' => 'required',
        'name'=> 'required',
        'portfolio'=> 'required',
        'email'=> 'required',
        'phone'=> 'required',
        'slug' => 'slug',
    ]);
    if($validator->fails()) {
        alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
        return redirect()->back();
    }

    $uuid = 'program' . Carbon::now();

    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $uuid)));
    $imageUrl = null;
    if($request->has('image')) {
        $imageUrl = 'uploads/instructor/'.$slug.'.'.$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->move('uploads/instructor', $imageUrl);
    }
    
    $newInstructor= ([
        'image' => $imageUrl,
        'name' => $request->name,
        'portfolio' => $request->portfolio,
        'email' => $request -> email,
        'phone' => $request -> phone,
        'slug' =>$slug,
    ]);


    if(Instructor::create($newInstructor)){
        alert()->success('Instructor Added successfully', '')->persistent('Close');
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

        $history = History::first();
        return view('admin.history', [
            'history' => $history,
        ]);
    }

    public function values(){
        $values = Value::get();
        return view('admin.vision',[
            'values' => $values,
        ]);
        
    }

    public function gallery(){
        
        $gallerys =Gallery::get();
        return view('admin.gallery',[
            'gallerys'=>$gallerys
        ]);
    }

    public function contact(){
        $contact = ContactUs::first();
        return view('admin.contact',[
            'contact' => $contact,
        ]);
    }

    public function studentFeedbacks(){
        $feedbacks = StudentFeedback::get();

        return view('admin.studentFeedbacks',[
            'feedbacks'=>$feedbacks
        ]);
    }

    public function apply(){

        return view('admin.apply');
    }


    public function instructor(){
        $instructors = Instructor::get();
        return view('admin.instructor',[
            'instructors'=> $instructors,
        ]);
    }
    public function mission()
    
    {
        $missions = Mission::get();
        $values = Value::get(); 
        return view('admin.mission',[
            'missions' => $missions,
            'values' => $values,
        ]);
    }


}



