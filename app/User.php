<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Challenge;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public static function blah($request)
    {
        
        return User::where('email','kuhjg@gmail.com')->get();
    }

    public function challenge()
    {
       return $this->hasOne('App\Challenge');
    }
    public function submission()
    {
        return $this->hasMany('App\Submission');
    }
}
