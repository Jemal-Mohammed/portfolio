<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Cordinator;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Models\DepartmentHead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class LoginController extends Controller
{
    public function login(Request $request){
        // student
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:6|max:12',
            'role'=>'required',

        ]);
        if($request->role=='student'){
            $credencials=$request->validate([
              'username'=>['required'],
              'password'=>['required'],
          ]);
$user=Student::where('username',$request->username)->first();
//    dd($user);
if($user){

   if(Hash::check($request->password, $user->password)){

                  $request->session()->put('user',$user);
                return redirect()->intended('/')->with('message','welcome!! you have successfuly loged in');
          }
}
else{
return back()->with(['error'=>'the provided user not registered']);

}
     return back()->with(['error'=>'the provided crendetials does not match!!']);
         }
            // cordinator
            if($request->role=='coordinator'){
                $credencials=$request->validate([
                  'username'=>['required'],
                  'password'=>['required'],
              ]);
   $user=Cordinator::where('email',$request->username)->first();
//    dd($user);
   if($user){
    if($user->status=='activated'){

        if(Hash::check($request->password, $user->password)){

                       $request->session()->put('user',$user);
                     return redirect()->intended('/dashboard')->with('message','welcome!! you have successfuly loged in');
               }
         return back()->with(['error'=>'the provided crendetials does not match!!']);

    }
    else{
    return back()->with(['warning'=>'Your acount is Deactivated Contact the system Admin']);

    }
    }
   else{
    return back()->with(['error'=>'the provided user not registered']);

   }
             }
            // head
 if($request->role=='head'){
                $credencials=$request->validate([
                  'username'=>['required'],
                  'password'=>['required'],
              ]);
   $user=DepartmentHead::where('email',$request->username)->first();
//    dd($user);
   if($user){
    if($user->status=='activated'){
       if(Hash::check($request->password, $user->password)){

                      $request->session()->put('user',$user);
                    return redirect()->intended('/dashboard')->with('message','welcome!! you have successfuly loged in');
              }
              return back()->with(['error'=>'the provided crendetials does not match!!']);

            }
            else{
                return back()->with(['warning'=>'Your acount is Deactivated Contact the system Admin']);

            }
   }
   else{
    return back()->with(['error'=>'the provided user not registered']);

   }
             }
            //  super visor
            if($request->role=='supervisor'){
                $credencials=$request->validate([
                  'username'=>['required'],
                  'password'=>['required'],
              ]);
   $user=Supervisor::where('email',$request->username)->first();
//    dd($user);
   if($user){
    if($user->status=='activated'){
       if(Hash::check($request->password, $user->password)){

                      $request->session()->put('user',$user);
                    return redirect()->intended('/dashboard')->with('message','welcome!! you have successfuly loged in');
              }
              return back()->with(['error'=>'the provided crendetials does not match!!']);

            }
            else{
                return back()->with(['warning'=>'Your acount is Deactivated Contact the system Admin']);

            }
        }
   else{
    return back()->with(['error'=>'the provided user not registered']);

   }
             }
            //  Admin
            if($request->role=='admin'){
                $credencials=$request->validate([
                  'username'=>['required'],
                  'password'=>['required'],
              ]);
   $user=Admin::where('email',$request->username)->first();
//    dd($user);
   if($user){
       if($user->password==md5($request->password)){

                      $request->session()->put('user',$user);
                    return redirect()->intended('/dashboard')->with('message','welcome!! you have successfuly loged in');
              }
   }
   else{
    return back()->with(['error'=>'the provided user not registered']);

   }
         return back()->with(['error'=>'the provided crendetials does not match!!']);
             }
    }
    public function logout(){
        session()->forget('user');
           session()->flush();
        return redirect('/')->with(['info'=>'logout succesful!!']);
    }
}
