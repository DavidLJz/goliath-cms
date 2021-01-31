<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\assignment;

class assignee extends Model
{
    public function assignment()
    {
    	return $this->belongsTo(assignment::class, 'assignment_id', 'id');
    }
}
