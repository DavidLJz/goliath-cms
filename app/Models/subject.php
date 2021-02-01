<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\assignment;

class subject extends Model
{
    public function assignment()
    {
    	return $this->hasMany(assignment::class, 'subject_id', 'id');
    }
}
