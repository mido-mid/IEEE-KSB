<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    //

    public $timestamps = false;

    protected $fillable = [
        'eng_name', 'arab_name', 'gmail','linkedin','committee_id','role_id'
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function committee() {
        return $this->belongsTo('App\Committee');
    }

    public function photo() {
        return $this->morphOne('App\Photo', 'photoable');
    }
}
