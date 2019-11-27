<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='coupon';
    protected $fillable=['code','percent_off','created_by','modified_by','no_of_uses'];
}
