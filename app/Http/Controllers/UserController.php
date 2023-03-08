<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('backend.users.viewUsers',compact('users'));
    }
    public function addUsers(Request $request){
        $user=new User();
        $request->validate([
            'Fname'=>'required',
            'Lname'=>'required',
            'email'=>'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'=>'required',

        ]);
        // dd($request->all());
        $user->Fname=$request->Fname;
        $user->Lname=$request->Lname;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->department_id=$request->department_id;
        $user->password=Hash::make($request->password);
   if( $user->save()){
    return back()->with(['message'=>'user Added successfully!!']);
   }
   return back()->with(['error'=>'something went wrong!!']);
    }
  public function createUsers(){
    $departments=Department::all();
    return view('backend.users.createUsers',compact('departments'));
  }
}
