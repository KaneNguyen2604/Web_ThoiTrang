<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $table ="content";
	protected $fillable = [
        'name',	'alias','order','parent_id','keywords','description'
    ];
    public $timestamps = false;
     public function cate()
    {    	
    	return $this->belongto('App\Cate');
    }
 
}
