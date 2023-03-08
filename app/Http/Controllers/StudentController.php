<?php

namespace App\Http\Controllers;

use App\Models\Applly;
use App\Models\Choice;
use App\Models\Student;
use App\Mail\StudentMail;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentHead;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function signUp(){
     $departments=Department::all();
        return view('frontend.auth.register',compact('departments'));
    }
   public function students(){

        $students=Student::where('department_id',session('user')->department_id)->get();
        return view('backend.student.allStudents',compact('students'));
   }
 public function register(Request $reuest){
        $student=new Student();
        $reuest->validate([
            'Fname'=>'required',
            'Lname'=>'required',
            'email'=>'required|email|unique:students',
            'username'=>'required|unique:students',
            'department_id'=>'required',
        ]);
        $student->Fname=$reuest->Fname;
        $student->Lname=$reuest->Lname;
        $student->email=$reuest->email;
        $student->username=$reuest->username;
        $student->department_id=$reuest->department_id;
        if($student->save()){
            return redirect('/signIn')->with(['message'=>'registration successful!!']);
        }
        return back()->with(['error'=>'somethin went wrong please try again!!']);

    }
    public function viewassignCGPA($id){
        $student=Student::find($id);
        return view('backend.student.AssignCGPA',compact('student'));
    }
    public function assignCGPA(Request $reuest,$id){
            $student=Student::find($id);
            $request->validate(['CGPA'=>'required|min:4|max:0',
            ]);
            // dd($id);
            $student->CGPA=$reuest->CGPA;
            $randomNumber=random_int(100000, 999999);
            $student->password=Hash::make($randomNumber);
            if($student->update()){
                $password=array(
                    'password'=>$randomNumber,
                    'name'=>$student->Fname,

                );
                    Mail::to($student->email)->send(new StudentMail($password));
                return redirect('/students')->with(['info'=>'Student CGPA Assigned successfully']);
            }
            return back()->with(['warning'=>'Something went wrong']);

    }
   public function unAssignedSudents(){
    // $students=Choice::with('Student','company')->orderBy('stud_id','ASC')->get();
    $students = Choice::join('students', 'choices.stud_id', '=', 'students.id')
    ->orderBy('students.CGPA', 'asc')
    ->get(['choices.*']);
    return view('backend.student.unAssignedStudents',compact('students'));
   }
   public function assignedStudents(){

    $students=Applly::where('sup_id',session('user')->id)->with('student')->get();
    $students1=Choice::where('cam_id',session('user')->id)->with('Student')->get();
    return view('backend.student.assignedStudents',compact('students','students1'));
   }
  public function insertresult($id){

    $student=Student::find($id);
    return view('backend.student.insertResult',compact('student'));
  }
  public function assignResult(Request $request,$id){
    // dd('dd');
    $request->validate(['recomendation'=>'required',
                        'apparentResult'=>'required']);
   $assignResult=Student::find($id);
//    $assignResult->recomendation=$request->recomendation;
   if($request->hasFile('recomendation')){
    $file=$request->recomendation;
    $fileName="images".time().".".$file->extension();
    $file->storeAs("images", $fileName, 'public');
    $assignResult->recomendation="storage/images/".$fileName;
}
   $assignResult->apparentResult=$request->apparentResult;

   $assignResult->update();
   return back()->with(['message'=>'Result sent successfully']);

  }
  public function download($id){
    $student=Student::find($id);
    $student=$student->recomendation;
    // $path = storage_path($image);
    if($student){

        return response()->download($student);
    }
    return back()->with('warning','There is no attached file');

 }
}
