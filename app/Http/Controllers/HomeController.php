<?php

namespace App\Http\Controllers;

use App\Models\Carrer;
use App\Models\Student;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function welcom(){
    $departments=Department::all();
    return view('frontend.welcome',compact('departments'));
}
public function positions(){
    $positions=Position::with('supervisor')->get();
    // dd($positions);
    return view('frontend.positions.allPositions',compact('positions'));
}
public function carrers(){
    $carrers=Carrer::with('supervisor')->get();
    // dd($carrers);
    return view('frontend.carrers.allCarrers',compact('carrers'));
}
public function count(){
    $students=Student::count();
    $departments=Department::count();
    $Ipositions=Position::count();
    $Cpositions=Carrer::count();
    return view('frontend.welcome',compact('students','departments','Ipositions','Cpositions'));

}
}
