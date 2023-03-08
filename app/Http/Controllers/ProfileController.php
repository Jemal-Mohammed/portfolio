<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Cordinator;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Models\DepartmentHead;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile($id){

        $student=Student::find($id);
        return view('frontend.profile.index',compact('student'));
    }
    public function backendProfile(){
        if(session('user')->role=='coordinator'){
            $profile=Cordinator::find(session('user')->id);


            return view('backend.profile.index',compact('profile'));
        }
        if(session('user')->role=='admin'){
            $profile=Admin::find(session('user')->id);


            return view('backend.profile.index',compact('profile'));
        }
        if(session('user')->role=='head'){
            $profile=DepartmentHead::find(session('user')->id);


            return view('backend.profile.index',compact('profile'));
        }
        if(session('user')->role=='supervisor'){
            $profile=Supervisor::find(session('user')->id);
            return view('backend.profile.index',compact('profile'));
        }
    }
public function updateProfile(REquest $request,$id){
    $request->validate([
        'Fname'=>'required',
        'Lname'=>'required',
        'phone'=>'required',
        'bank_acount_no'=>'required',
        'bank_name'=>'required',
        'spacialSkill'=>'required',
    ]);
    $student=Student::find($id);
    $student->Fname=$request->Fname;
    $student->Lname=$request->Lname;
    $student->phone=$request->phone;
    $student->bank_acount_no=$request->bank_acount_no;
    $student->bank_name=$request->bank_name;
    $student->spacialSkill=$request->spacialSkill;
    $student->status='activated';

    if($request->hasFile('image')){
        $file=$request->image;
        $fileName="images".time().".".$file->extension();
        $file->storeAs("images", $fileName, 'public');
        $student->image="storage/images/".$fileName;
    }
if($student->update()){
    return back()->with('message','Your profile is completed know you can apply!!');
}
return back()->with('error','something went wrong');

}
public function changePassword(Request $request,$id){
    $request->validate([
        'password'=>'required|min:6',
        'newpassword'=>'required|min:6'
    ]);
    if(session('user')->role=='student'){
        $student=Student::find($id);
            if(Hash::check($request->password, $student->password)){
                // dd('yes');
                $student->password=Hash::make($request->newpassword);
                $student->update();
                return back()->with(['message'=>'you have successfully change your password!!']);
            }
            else{
                return back()->with(['error'=>'Your password is Incorrect!!']);

            }
    }
}
public function changeBackendPassword(Request $request,$id){
    $request->validate([
        'password'=>'required|min:6',
        'newpassword'=>'required|min:6'
    ]);

        if(session('user')->role=='admin'){

            $admin=Admin::find($id);
                if(Hash::check($request->password, $admin->password)){
                    // dd('yes');
                    $admin->password=Hash::make($request->newpassword);
                    $admin->update();
                    return back()->with(['message'=>'you have successfully change your password!!']);
                }
                else{
                    return back()->with(['error'=>'Your password is Incorrect!!']);

                }
        }
        // coordinator
        if(session('user')->role=='coordinator'){

            $coordinator=Cordinator::find($id);
                if(Hash::check($request->password, $coordinator->password)){
                    // dd('yes');
                    $coordinator->password=Hash::make($request->newpassword);
                    $coordinator->update();
                    return back()->with(['message'=>'you have successfully change your password!!']);
                }
                else{
                    return back()->with(['error'=>'Your password is Incorrect!!']);

                }
        }
          // departmenthead
          if(session('user')->role=='head'){

            $head=DepartmentHead::find($id);
                if(Hash::check($request->password, $head->password)){
                    // dd('yes');
                    $head->password=Hash::make($request->newpassword);
                    $head->update();
                    return back()->with(['message'=>'you have successfully change your password!!']);
                }
                else{
                    return back()->with(['error'=>'Your password is Incorrect!!']);

                }
        }
          // supervisor
          if(session('user')->role=='head'){

            $supervisor=Supervisor::find($id);
                if(Hash::check($request->password, $supervisor->password)){
                    // dd('yes');
                    $supervisor->password=Hash::make($request->newpassword);
                    $supervisor->update();
                    return back()->with(['message'=>'you have successfully change your password!!']);
                }
                else{
                    return back()->with(['error'=>'Your password is Incorrect!!']);

                }
        }

}
public function updateBackendProfile(Request $request,$id){
    // admin
             if(session('user')->role=='admin'){
        $admin=Admin::find($id);
              $admin->Fname=$request->Fname;
              $admin->Lname=$request->Lname;
              if($request->hasFile('image')){
                $file=$request->image;
                $fileName="images".time().".".$file->extension();
                $file->storeAs("images", $fileName, 'public');
                $admin->image="storage/images/".$fileName;
            }
    if($admin->update()){
        return back()->with('message','profile updateed successfully');
    }
    return back()->with('error','Something went wrong!!');

             }
               // coordinator
               if(session('user')->role=='coordinator'){
                // dd($request->all());
                $coordinator=Cordinator::find($id);
                      $coordinator->Fname=$request->Fname;
                      $coordinator->Lname=$request->Lname;
                      $coordinator->phone=$request->phone;
                      if($request->hasFile('image')){
                        $file=$request->image;
                        $fileName="images".time().".".$file->extension();
                        $file->storeAs("images", $fileName, 'public');
                        $coordinator->image="storage/images/".$fileName;
                    }
            if($coordinator->update()){
                return back()->with('message','profile updateed successfully');
            }
            return back()->with('error','Something went wrong!!');

                     }
                       // supervisor
               if(session('user')->role=='supervisor'){
                $supervisor=Supervisor::find($id);
                      $supervisor->Fname=$request->Fname;
                      $supervisor->Lname=$request->Lname;
                      $supervisor->phone=$request->phone;

                      if($request->hasFile('image')){
                        $file=$request->image;
                        $fileName="images".time().".".$file->extension();
                        $file->storeAs("images", $fileName, 'public');
                        $supervisor->image="storage/images/".$fileName;
                    }
            if($supervisor->update()){
                return back()->with('message','profile updateed successfully');
            }
            return back()->with('error','Something went wrong!!');

                     }
                            // department head
               if(session('user')->role=='head'){
                $departmentHead=DepartmentHead::find($id);
                      $departmentHead->Fname=$request->Fname;
                      $departmentHead->Lname=$request->Lname;
                      $departmentHead->phone=$request->phone;

                      if($request->hasFile('image')){
                        $file=$request->image;
                        $fileName="images".time().".".$file->extension();
                        $file->storeAs("images", $fileName, 'public');
                        $departmentHead->image="storage/images/".$fileName;
                    }
            if($departmentHead->update()){
                return back()->with('message','profile updateed successfully');
            }
            return back()->with('error','Something went wrong!!');

                     }
}
}
