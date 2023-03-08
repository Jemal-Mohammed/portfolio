<?php

namespace App\Http\Controllers;

use App\Models\Applly;
use App\Models\Student;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppllyController extends Controller
{
    public function apply(Request $request,$id){
        // $request->validate(['stud_id'=>'unique']);
        if(session('user')->role=='student'){
             $student=Student::find(session('user')->id);
            if($student->status=='Deactive'){
                return redirect(url('/profile',session('user')->id))->with(['warning'=>'first complete your profile']);
            }
            $apply=new Applly();
            $apply->department_id=$student->department_id;
            $apply->stud_id=session('user')->id;
            $apply->position_id=$id;
            $position=Position::find($id);
            // dd($position);
            $apply->sup_id=$position->sup_id;
            $alreadyInserted =  DB::table('appllies')
            ->where('stud_id', session('user')->id)
            ->where('position_id', $id)
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

    public function applicants(){
        $applicants=Applly::where('sup_id',session('user')->id)->with('supervisor','position','student')->get();
        return view('backend.applicants.index',compact('applicants'));
    }
}
