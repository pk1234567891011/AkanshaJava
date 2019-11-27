<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_attribute_values extends Model
{
    protected $table='product_attribute_values';
    protected $fillable=['product_attribute_id','attribute_value','created_by','modified_by'];
    public function child()
        {
            return $this->belongsTo('App\Product_attributes');
        }
    
}
