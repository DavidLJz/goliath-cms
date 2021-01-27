<?php

namespace App\Models;

use App\Models\task_member;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    public function members()
    {
    	return $this->hasMany(task_member::class, 'task_id', 'id');
    }
}
