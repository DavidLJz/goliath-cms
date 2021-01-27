<?php

namespace App\Models;

use App\Models\task;
use App\Models\task_role;
use Illuminate\Database\Eloquent\Model;

class task_member extends Model
{
    public function task()
    {
    	return $this->belongsTo(task::class, 'task_id', 'id');
    }

    public function role()
    {
    	return $this->hasOne(task_role::class, 'role_id', 'id');
    }
}