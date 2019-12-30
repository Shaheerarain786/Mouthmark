<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryFilter extends Model
{
    public function tasks(){
        $this->belongsTo(Task::class,'task_id');
    }
}
