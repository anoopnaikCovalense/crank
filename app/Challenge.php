<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
class Challenge extends Model
{
     
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function submission()
    {
    	return $this->hasOne('App\Submission');
    }
}
