<?php

namespace App\Http\Controllers;

use App\Models\Applly;
use App\Models\Choice;
use App\Models\Company;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlacementInfoController extends Controller
{
    public function placementInfo(){
        $companies=Company::all();
        $applies=Applly::where('stud_id',session('user')->id)->with('position','student')->get();
        return view('frontend.Applications.viewApplicatons',compact('applies','companies'));
    }
    public function placementChoice(){
        $companies=Company::all();
        $results=Choice::where('stud_id',session('user')->id)->with('Student','company')->get();
        // $results=Company::where('sup_id',session('user')->id)->with('supervisor')->get();
        return view('frontend.choice.choice',compact('companies','results'));
    }
    public function acceptStudent($id){
        $applly=Applly::find($id);
        // dd($id);
        if($applly->status=='accepted'||$applly->status=='assigned'){
            return back()->with('warning','The student have allready assigned');
        }
        $applly->status='accepted';
        $applly->feedback='yes';

        if($applly->update()){

            return back()->with(['message'=>'you have accepted successfully']);
        }
        return back()->with(['error'=>'Something went wrong']);

    }
   public function makePlacement($id){
       $choices=Choice::with('Student')->find($id);
      $student=Student::find($choices->stud_id);
//   dd($student->feedback);
    //    dd($cam_id->cam_id);
        $alreadyInserted=DB::table('choices')
        ->where('stud_id', session('user')->id)
        ->where('status', 'assigned')
        ->first();
   if ($alreadyInserted) {
                    // dd($alreadyInserted->stud_id);
   return back()->with(['warning'=>'it has been allready assigned']);
       }

   $choices->Student->feedback='yes';
   $choices->status='assigned';

   if($choices->update()){
    return back()->with('message','successfully assigned');
   }
return back()->with('error','something went wrong');
   }
}



