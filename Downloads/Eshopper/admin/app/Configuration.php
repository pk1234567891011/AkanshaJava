<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table='configuration';
    protected $fillable=['conf_key','conf_value','status'];
}
