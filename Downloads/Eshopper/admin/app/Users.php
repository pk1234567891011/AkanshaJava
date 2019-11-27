<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='users';
    protected $fillable=['firstname','lastname','email','password','role_id','status'];
     public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
