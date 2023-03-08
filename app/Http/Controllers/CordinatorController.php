<?php

namespace App\Http\Controllers;

use App\Models\Cordinator;
use Illuminate\Http\Request;
use App\Mail\CoordinatorMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CordinatorController extends Controller
{
    public function index(){
        $coordinators=Cordinator::all();
        return view('backend.coordinators.allCoordinators',compact('coordinators'));
    }
    public function addCoordinators(Request $request){
        $user=new Cordinator();
        $request->validate([
            'Fname'=>'required',
            'Lname'=>'required',
            'email'=>'required|unique:cordinators',
            'password' => 'required|confirmed|min:6',
        ]);
        // dd($request->all());
        $user->Fname=$request->Fname;
        $user->Lname=$request->Lname;
        $user->email=$request->email;
        $user->role='coordinator';
        $user->password=Hash::make($request->password);
   if( $user->save()){
    $acount=array(
        'password'=>$request->password,
        'name'=>$user->Fname,
        'email'=>$request->email

    );
    Mail::to($user->email)->send(new CoordinatorMail($acount));
    return back()->with(['message'=>'Coordinator Added successfully!!']);
   }
   return back()->with(['error'=>'something went wrong!!']);

    }
   public function ActivateCoordinator($id){
       $coordinator=Cordinator::find($id);

       if($coordinator->status=='activated'){
        return back()->with(['warning'=>'The acount is allready active!!']);
       }
       $coordinator->status='activated';
       if($coordinator->update()){
        return back()->with(['message'=>'you have activated it successfully!!']);
       }
       return back()->with(['error'=>'something went wrong!!']);

   }
   public function DeactivateCoordinator($id){
    $coordinator=Cordinator::find($id);
    if($coordinator->status=='deactive'){
     return back()->with(['warning'=>'The acount is allready deactive!!']);
    }
    $coordinator->status='deactive';
    if($coordinator->update()){
     return back()->with(['message'=>'you have Deactivated it successfully!!']);
    }
    return back()->with(['error'=>'something went wrong!!']);

}
public function DeleteCoordinator($id){
    $coordinator=Cordinator::find($id);
    // dd('dd');
    if($coordinator->delete()){
        return back()->with('warning','data deleted successfully');
    }
    return back()->with('danger','Somerhing went wrong');

}
}
