<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\student;

class student_group extends Model
{
    public function student()
    {
    	return $this->hasMany(student::class, 'group_id', 'id');
    }
}
