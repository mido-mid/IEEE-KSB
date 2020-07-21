<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    //

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function volunteers() {
    	return $this->hasMany('App\Volunteer');
    }
}
