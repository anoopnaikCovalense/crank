<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
   
    public function user()
    {
    	return $this->belongsToMany('App\User');
    }
    public function challenge()
    {
        return $this->belongsTo('App\Challenge');
    }

}
