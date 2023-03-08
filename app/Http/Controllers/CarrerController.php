<?php

namespace App\Http\Controllers;

use App\Models\Carrer;
use App\Models\Student;
use App\Mail\ApplicantMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CarrerController extends Controller
{
    public function allCarrers(){
        $carrers=Carrer::where('sup_id',session('user')->id)->get();
        return view('backend.carrers.allCarrers',compact('carrers'));
    }
    public function addCarrers(Request $request){

        $carrer=new Carrer();
        $request->validate([
            'companyName'=>'required',
            'title'=>'required',
            'address'=>'required',
            'city'=>'required',
            'salery'=>'required',

        ]);
        // dd($request->all());
        $carrer->companyName=$request->companyName;
        $carrer->title=$request->title;
        $carrer->address=$request->address;
        $carrer->city=$request->city;
        $carrer->salery=$request->salery;
        $carrer->sup_id=session('user')->id;
        if($carrer->save()){
            return back()->with(['message'=>'Carrre added successfully']);
        }
        return back()->with(['error'=>'Something went wrong']);

    }
   public function inviteApplicant(Request $request,$id){
    $student=Student::find($id);
    // dd($id);
    $email=$student->email;
    $messages=array(
        'name'=>$student->Fname,
        'email'=>$request->Fname,

      );
    Mail::to($email)->send(new ApplicantMail($messages));
                return redirect('/carrerapplicants')->with(['info'=>'Invitation successfully']);
   }
}
