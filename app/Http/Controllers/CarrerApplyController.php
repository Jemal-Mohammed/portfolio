<?php

namespace App\Http\Controllers;

use App\Models\Carrer;
use App\Models\Student;
use App\Models\Position;
use App\Models\CarrerApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarrerApplyController extends Controller
{

    public function carrerApply(Request $request,$id){
        if(session('user')->role=='student'){
            $student=Student::find(session('user')->id);
           if($student->status=='Deactive'){
               return redirect(url('/profile',session('user')->id))->with(['warning'=>'first complete your profile']);
           }
           $apply=new CarrerApply();
           $apply->stud_id=session('user')->id;
           $apply->carrer_id=$id;
           $position=Carrer::find($id);
           // dd($position);
           $apply->sup_id=$position->sup_id;
           $alreadyInserted =  DB::table('carrer_applies')
           ->where('stud_id', session('user')->id)
           ->where('carrer_id', $id)
           ->first();

               if ($alreadyInserted) {
                   // dd($alreadyInserted->stud_id);
                   return back()->with(['warning'=>'you have already applied this position']);
               }
               if($apply->save()){
                   return back()->with(['message'=>'you have applied successfully']);
               }

       }
       return back()->with(['error'=>'access denied']);
    }
    public function carrerapplicants(){
        // dd('yes');
        $carrerapplicants=CarrerApply::where('sup_id',session('user')->id)->with('supervisor','position','student')->get();
        return view('backend.applicants.carrerApplicants',compact('carrerapplicants'));
    }
}
