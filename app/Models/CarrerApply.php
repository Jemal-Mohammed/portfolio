<?php

namespace App\Models;

use App\Models\Carrer;
use App\Models\Student;
use App\Models\Position;
use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarrerApply extends Model
{
    use HasFactory;
    public function supervisor(){
        return $this->belongsTo(Supervisor::class,'sup_id','id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'stud_id','id');
    }
    public function position(){
        return $this->belongsTo(Carrer::class,'carrer_id','id');
    }
}

