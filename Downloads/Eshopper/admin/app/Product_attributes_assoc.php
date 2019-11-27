<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_attributes_assoc extends Model
{
    protected $table='product_attributes_assoc';
    protected $fillable=['product_id','product_attribute_id','product_attribute_value_id'];
}
