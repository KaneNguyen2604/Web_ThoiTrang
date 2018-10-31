<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table ="products";
	protected $fillable = [
        'name',	'alias',	'price',	'intro',	'content',	'image',	'keywords',	'description',	'featured',	'views',	'user_id',	'cate_id'
    ];
    //public $timestamps = false;
    public function cate()
    {    	
    	return $this->belongto('App\Cate','cate_id','id');
    }
    
 
     public function user()
    {    	
    	return $this->belongto('App\User');
    }
 
    public function pimages()
    {    	
    	return $this->hasMany('App\ProductImage');
    }
}
