<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    public function student(){
        return $this->belongsTo(Student::class,'stud_id','id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'department_id','id');
    }
}
