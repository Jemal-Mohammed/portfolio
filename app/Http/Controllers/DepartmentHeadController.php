<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentHead;
use App\Mail\DepartmentHeadMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DepartmentHeadController extends Controller
{
    public function index(){
        $users=DepartmentHead::all();
        return view('backend.DepartmentHeads.viewDepartmenthead',compact('users'));
    }
    public function addheads(Request $request){
        $user=new DepartmentHead();
        $request->validate([
            'Fname'=>'required',
            'Lname'=>'required',
            'email'=>'required|unique:department_heads',
            'password' => 'required|confirmed|min:6',
            'department_id'=>'required|unique:department_heads',
        ]);
        // dd($request->all());
        $user->Fname=$request->Fname;
        $user->Lname=$request->Lname;
        $user->email=$request->email;
        $user->role='head';
        $user->department_id=$request->department_id;
        $user->password=Hash::make($request->password);
   if( $user->save()){
    $acount=array(
        'password'=>$request->password,
        'name'=>$user->Fname,
        'email'=>$request->email

    );
    Mail::to($user->email)->send(new DepartmentHeadMail($acount));
    return back()->with(['message'=>'Department head Added successfully!!']);
   }
   return back()->with(['error'=>'something went wrong!!']);
    }
  public function createHeads(){
    $departments=Department::all();
    return view('backend.DepartmentHeads.createDepartmenthead',compact('departments'));
  }
  public function ActivateDH($id){
    $dh=DepartmentHead::find($id);
    if($dh->status=='activated'){
    return back()->with(['warning'=>'It is allready activated!!']);
    }
    $dh->status='activated';
    if($dh->update()){
    return back()->with(['message'=>'You have activated successfully !!']);

    }
    return back()->with(['error'=>'Somethin went wrong!!']);

  }
  public function DeactivateDH($id){
    $dh=DepartmentHead::find($id);
    if($dh->status=='deactive'){
    return back()->with(['warning'=>'It is allready Deactivated!!']);
    }
    $dh->status='deactive';
    if($dh->update()){
    return back()->with(['message'=>'You have Deactivated successfully !!']);

    }
    return back()->with(['error'=>'Somethin went wrong!!']);
  }
  public function deleteDepartmentHead($id){
    $departmentHead=DepartmentHead::find($id);
       if($departmentHead->delete()){
        return back()->with('warning','You Have deleted this acount succssfully');
       }
       return back()->with('error','Something went wrong');
  }
}
