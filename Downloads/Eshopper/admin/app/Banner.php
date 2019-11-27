<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table="banner";
    protected $fillable=['banner_path','status'];
        
}
