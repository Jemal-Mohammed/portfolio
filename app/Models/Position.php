<?php

namespace App\Models;

use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;
    public function supervisor(){
      return  $this->belongsTo(Supervisor::class,'sup_id','id');
    }
}
