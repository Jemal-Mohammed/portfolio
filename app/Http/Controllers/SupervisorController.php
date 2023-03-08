<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Mail\SupervisorMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SupervisorController extends Controller
{
    public function index(){
        $supervisors=Supervisor::all();
        return view('backend.supervisors.allSupervisors',compact('supervisors'));
    }
    public function addSupervisors(Request $request){
        $user=new Supervisor();
        $request->validate([
            'Fname'=>'required',
            'Lname'=>'required',
            'email'=>'required|unique:supervisors',
            'password' => 'required|confirmed|min:6',
        ]);
        // dd($request->all());
        $user->Fname=$request->Fname;
        $user->Lname=$request->Lname;
        $user->email=$request->email;
        $user->role='supervisor';
        $user->password=Hash::make($request->password);
   if( $user->save()){
    $acount=array(
        'password'=>$request->password,
        'name'=>$user->Fname,
        'email'=>$request->email

    );
    Mail::to($user->email)->send(new SupervisorMail($acount));
    return back()->with(['message'=>'Supervisor Added successfully!!']);
   }
   return back()->with(['error'=>'something went wrong!!']);
    }
public function ActivateSupervisor($id){
    $supervisor=Supervisor::find($id);
    if($supervisor->status=='activated'){
        return back()->with(['warning'=>'it is already activated']);
    }
    $supervisor->status='activated';
    if($supervisor->update()){
        return back()->with(['message'=>'you have Activated successfully!!']);
    }
    return back()->with(['error'=>'Something went wrong!!']);

}
public function DectivateSupervisor($id){
    $supervisor=Supervisor::find($id);
    if($supervisor->status=='deactive'){
        return back()->with(['warning'=>'it is already Deactivated']);
    }
    $supervisor->status='deactive';
    if($supervisor->update()){
        return back()->with(['message'=>'you have Dectivated successfully!!']);
    }
    return back()->with(['error'=>'Something went wrong!!']);

}
}
