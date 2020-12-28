<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollmentRequirement extends Model
{
    protected $fillable = [
        "user_id",  "req_name", "file_path", "comment"
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
