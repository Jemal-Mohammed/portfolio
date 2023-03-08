<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Choice extends Model
{
    use HasFactory;
    public function Student(){
        return $this->belongsTo(Student::class,'stud_id','id');
    }
    public function company(){
        return $this->belongsTo(Company::class,'cam_id','id');
    }

}
