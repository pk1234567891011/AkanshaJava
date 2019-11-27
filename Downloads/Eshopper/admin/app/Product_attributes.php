<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product_attributes extends Model
{
    protected $table='product_attributes';
    protected $fillable=['name','created_by','modified'];
    public function parent()
    {
        return $this->hasMany('App\Product_attribute_values','product_attribute_id','id');
    }
}
