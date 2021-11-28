<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Course;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';

    protected $guarded =[];
        //setting date from datepicker into database
     public function setBirthDateAttribute($value) 
     {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d-m-Y',$value)->format('Y-m-d');
     }
        //setting
     public function getBirthDateAttribute()
    {
      return Carbon::createFromFormat('Y-m-d',$this->attributes['birth_date'])->format('d-m-Y');  
    }

    public function Course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
