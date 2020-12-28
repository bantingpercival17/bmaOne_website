<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseOffer extends Model
{
    protected $fillable = [
        'course_name',
        'course_code',
        'department'
    ];
    
}
