<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function addPositions(Request $request){
        $position=new Position();
        // dd($request->all());
        $position->companyName=$request->companyName;
        $position->title=$request->title;
        $position->address=$request->address;
        $position->city=$request->city;
        $position->sup_id=session('user')->id;
               if($position->save()){
                return back()->with(['message'=>'position posted successfully']);
               }
               return back()->with(['error'=>'something wentt wrong']);

    }
   public function allpositions(){
    if(session('user')->role=='supervisor'){
    $positions=Position::where('sup_id',session('user')->id)->get();
    return view('backend.positions.allPositions',compact('positions'));
    }
    $positions=Position::all();
    return view('backend.positions.allPositions',compact('positions'));
   }
   public function deletePosition($id){
    //    dd('delete');
    $student=Student::find($id);
    if($student->delete()){
        return back()->with('message','Position deleted successfully!!');
    }
    return back()->with('message','Something went wrong');
   }
}
