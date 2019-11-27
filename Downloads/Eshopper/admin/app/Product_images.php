<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_images extends Model
{
    protected $table='product_images';
    protected $fillable=['image_name','status','created_by','modified_by','product_id'];
   public function image()
   {
       return $this->belongsTo('App\Product');
   }
}
