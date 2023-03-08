<?php

namespace App\Http\Controllers;

use App\Models\Applly;
use App\Models\Student;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
   public function sendFeedBack(Request $request,$id){
    $feedback=Applly::find($id);
    $request->validate(['feedback'=>'required']);
    $student=Student::find(session('user')->id);
    if($student->feedback=='yes'){
        return back()->with(['warning'=>'you have allready assigned']);
    }
    if($request->feedback=='yes'){
        $feedback->status='assigned';
        $feedback->feedback='yes';
        $student->feedback='yes';
        $feedback->update();
        $student->update();
    }
   else{
    $feedback->status='unassigned';
    $feedback->update();
    $feedback->feedback='No';
    $feedback->update();
   }
    return back()->with('info','feedback sent successfully');
   }
}
