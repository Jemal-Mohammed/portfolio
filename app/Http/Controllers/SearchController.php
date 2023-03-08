<?php

namespace App\Http\Controllers;

use App\Models\Carrer;
use App\Models\Student;
use App\Models\Position;
use App\Models\Department;
use App\Models\Supervisor;
use App\Models\DepartmentHead;
use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
class SearchController extends Controller
{
    public function search(Request $request){
        $url = url()->previous();
        // $posts = '';
        // dd($url);
        $search = $request->input('search');
        // dd($search);
        if($url='http://localhost:8000/allpositions'){
            $posts = Position::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->get();
                // dd($posts);
            return view('backend.search.index', compact('posts'));
        }
        elseif($url='http://localhost:8000/allCarrers'){
            $posts = Carrer::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->get();
            return view('backend.search.index', compact('posts'));
        }
        elseif($url='http://localhost:8000/assignedStudents'){
            $posts = Student::query()
                ->where('Fname', 'LIKE', "%{$search}%")
                ->orWhere('Lname', 'LIKE', "%{$search}%")
                ->get();
                dd($posts);
            return view('backend.search.index', compact('posts'));
        }
        elseif($url='http://localhost:8000/all-department'){
            $posts = Department::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->get();
            return view('backend.search.index', compact('posts'));
        }
        elseif($url='http://localhost:8000/viewHeads'){
            $posts = DepartmentHead::query()
                ->where('Fname', 'LIKE', "%{$search}%")
                ->orWhere('Lname', 'LIKE', "%{$search}%")
                ->get();
            return view('backend.search.index', compact('posts'));
        }
        elseif($url='http://localhost:8000/allSupervisors'){
            $posts = Supervisor::query()
                ->where('Fname', 'LIKE', "%{$search}%")
                ->orWhere('Lname', 'LIKE', "%{$search}%")
                ->get();
            return view('backend.search.index', compact('posts'));
        }
        return view('backend.search.index');
    }
}
