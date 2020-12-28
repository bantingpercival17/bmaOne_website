<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollmentApplication extends Model
{
    protected $fillable = [
        'user_id', "course_id","year_level","lrn","average"
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function courseOffer()
    {
        return $this->belongsTo(CourseOffer::class,'course_id');
    }
    
}
