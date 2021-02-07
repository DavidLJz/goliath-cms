<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\assignee;
use App\Models\student_group;

class student extends Model
{
    public function assignee()
    {
    	return $this->hasOne(assignee::class, 'student_id', 'id');
    }

    public function student_group()
    {
    	return $this->belongsTo(student_group::class, 'group_id', 'id');
    }
}
