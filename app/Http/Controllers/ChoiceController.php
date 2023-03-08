<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChoiceController extends Controller
{
    public function choice(Request $request){
        $student=Student::find(session('user')->id);
        // dd($student->status);


         $choice=new Choice();
         $request->validate([
            'choice'=>'required',
            'priority'=>'required'
             ]);
             if($student->feedback=='yes'){
                return back()->with(['warning'=>'you have allready Assigned']);
         }
            if($student->status=='Deactive'){
                   return redirect('/profile',session('user')->id)->with(['warning'=>'first complete your profile']);
            }
             $choice->priority=$request->priority;
             $choice->stud_id=session('user')->id;
             $choice->cam_id=$request->choice;
             $alreadyInserted =DB::table('choices')
             ->where('stud_id', session('user')->id)
             ->where('priority', $request->priority)
             ->first();

                 if ($alreadyInserted) {
                     // dd($alreadyInserted->stud_id);
                     return back()->with(['warning'=>'you have already select this Company']);
                 }
                 $alreadyInserted1 =DB::table('choices')
                 ->where('cam_id', $request->choice)
                 ->where('priority', $request->priority)
                 ->first();

                     if ($alreadyInserted1) {
                         // dd($alreadyInserted->stud_id);
                         return back()->with(['warning'=>'you have already select this Company']);
                     }
         if(session('user')->feedback!='yes'){
          if($choice->save()){
           return back()->with('message','you have choose successfully!!');
                  }
    return back()->with(['message'=>'Something went wrong']);

            }
            else{
                return back()->with(['warning'=>'You have Allready Assigned']);

                        }



       }



}
