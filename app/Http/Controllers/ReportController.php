<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sendReport(Request $request){
        $report=new Report();

        $request->validate(['report'=>'file|required']);
        $student=Student::where('id',session('user')->id)->get();
        $student->department_id=session('user')->department_id;
        $report->stud_id=session('user')->id;
        $report->department_id=session('user')->department_id;
        if($request->hasFile('report')){
            $file=$request->report;
            $fileName="images".time().".".$file->extension();
            $file->storeAs("images", $fileName, 'public');
            $report->report="storage/images/".$fileName;
        }

         if($report->save()){
            return back()->with('message','report sent successfully');
         }
         return back()->with('error','Something went wrong');

    }
   public function viewReports(){

    $reports=Report::with('student','department')->get();
    return view('backend.report.index',compact('reports'));
   }
   public function downloadReports($id){
    $student=Report::find($id);
    $student=$student->report;
    // $path = storage_path($image);
    if($student){

        return response()->download($student);
    }
    return back()->with('warning','There is no attached file');
   }
}
