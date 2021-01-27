<?php

namespace App\Models;

use App\Models\task_member;
use Illuminate\Database\Eloquent\Model;

class task_role extends Model
{
    public function member()
    {
    	return $this->belongsTo(task_member::class, 'role_id', 'id');
    }
}
