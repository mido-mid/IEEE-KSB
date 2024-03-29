<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    public $timestamps = false;

    protected $table = 'photoable';
	
    protected $fillable = [
    	'filename',
    	'photoable_id',
    	'photoable_type'
    ];
    
    public function photoable() {
    	return $this->morphTo('App\Photo');
    }

}
