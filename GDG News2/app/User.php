<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    //get user rank
    static public function getUserRank($userank) {
        
        if($userank == 0) {
            $rank = '<span class="btn btn-primary">User</span>';
        }
        elseif($userank == 1) {
            $rank = '<span class="btn btn-success">Supervisor</span>';
        }
        else {
            $rank = '<span class="btn btn-primary">Admin</span>';
        }
        
       return $rank; 
    }
    
    //get user
    static public function getUser($id) {
        
        if(self::where('id',$id)->count() > 0) {
            $user = self::where('id',$id)->first();
            $name = $user->name;
            
            return $name;
        }
        
    }
    
    //
}
