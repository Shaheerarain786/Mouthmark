<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvertiserCompanyDetail extends Model
{
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
