<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    public function tasks(){
        return $this->belongsTo(Task::class,'task_id');
    }
}
