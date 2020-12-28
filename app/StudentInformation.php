<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    protected $fillable = [
        'user_id', 'last_name', 'first_name', 'middle_name', 'extention_name', 'birthday', 'birth_place', 'sex', 'nationality', 'status', 'street','barangay', 'city', 'province', 'region', 'father_name', 'mother_name', 'father_contact_number', 'mother_contact_number', 'parent_address'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
