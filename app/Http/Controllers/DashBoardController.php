<?php

namespace App\Http\Controllers;

use App\Models\Carrer;
use App\Models\Student;
use App\Models\Department;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        $student=Student::count();
        $carrer=Carrer::count();
        $supervisor=Supervisor::count();
        $department=Department::count();
        return view('backend.pages.dashboard',compact('department','carrer','student','supervisor'));
    }
}
