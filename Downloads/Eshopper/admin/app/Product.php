<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
	protected $table='product';
	protected $fillable=['name','sku','short_description','long_description','price','special_price','special_price_from','special_price_to','status','quantity','meta_title','meta_description','meta_keywords','is_featured'];
	public function imgs()
	{
		return $this->hasMany('App\Product_images');
	}
}
