<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table="cart";
    protected $fillable=['product_id','product_name','product_color','size','price','quantity','user_email','session'];
}
