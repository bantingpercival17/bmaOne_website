<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalBackground extends Model
{
    protected $fillable = [
        'user_id',
        'school_name',
        'school_level',
        'address',
        'year',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
