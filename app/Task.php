<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function filters(){
        return $this->hasOne(Filters::class);
    }
    public function country_filter(){
        return $this->hasMany(CountryFilter::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($task){
            $task->filters()->delete();
            $task->country_filter()->delete();
        });
    }
}
