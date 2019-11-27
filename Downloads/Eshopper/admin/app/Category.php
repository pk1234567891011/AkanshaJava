<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category';
    protected $fillable=['name','parent_id','status'];
    public function sub_category()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function parent_category()
    {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Category','parent_id');   
    }
}