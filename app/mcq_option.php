<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcq_option extends Model
{
    public function mcq_question()
    {
        return $this->belongsTo('App\mcq_question');
    }
}
