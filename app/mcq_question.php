<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcq_question extends Model
{
    public function mcq_option()
    {
    	return $this->hasMany('App\mcq_option');
    }
}
