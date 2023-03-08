<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin;
use App\Models\DepartmentHead;
use App\Models\Student;
use App\Models\Cordinator;
use App\Models\Supervisor;
class Contact extends Model
{
    public function user($id, $role)
    {
      if($role == 'admin'){
$admin = Admin::where('id', $id)->first();
return $admin;
      }
      if($role == 'coordinator'){
        $admin = Cordinator::where('id', $id)->first();
        return $admin;
    }
    if($role == 'head'){
        $admin = DepartmentHead::where('id', $id)->first();
        return $admin;
    }
    if($role == 'student'){
        $admin = Student::where('id', $id)->first();
return $admin;
    }
    if($role == 'supervisor'){
        $admin = Supervisor::where('id', $id)->first();
        return $admin;
    }
    }
    use HasFactory;
}
