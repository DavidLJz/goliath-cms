<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\assignee;
use App\Models\assignment_requirement;
use App\Models\subject;

class assignment extends Model
{
    public function assignee()
    {
    	return $this->hasMany(assignee::class, 'assignment_id', 'id');
    }    

    public function assignment_requirement()
    {
    	return $this->hasMany(assignment_requirement::class, 'assignment_id', 'id');
    }

    public function subject()
    {
    	return $this->belongsTo(subject::class, 'subject_id', 'id');
    }
}
