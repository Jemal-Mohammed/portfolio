<?php

namespace App\Http\Controllers;

use App\Models\Applly;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentHead;

class DepartmentController extends Controller
{
    public function allDepartment()
    {
        $departments=Department::all();
        return view('backend.department.viewDepartments',compact('departments'));
    }
    public function index(){
        $departments=Department::all();
        return view('backend.department.viewDepartments',compact('departments'));
    }
     public function addDepartments(Request $request){
        $deprtment=new Department();
        $request->validate(['name'=>'required|unique:departments']);
        $deprtment->name=$request->name;
        if($deprtment->save()){
            return back()->with(['message'=>'department added successfully']);
        }
        return back()->with(['error'=>'something went wrong!!']);

     }
    public function deleteDepartment($id){
        $department=Department::find($id);
        $departmentHeads=DepartmentHead::where('department_id','=',$id)->get();
        $applys=Applly::where('department_id','=',$id)->get();
        $students=Student::where('department_id','=',$id)->get();
        foreach($applys as $apply){
            $apply->delete();
        }
              foreach($departmentHeads as $departmentHead){
                $departmentHead->delete();
              }
              foreach($students as $student){
                $student->delete();
              }
        if($department->delete()){
            return back()->with(['warning'=>'you have deleted successfully']);
        }
        return back()->with(['error'=>'Something went wrong']);

    }
}
