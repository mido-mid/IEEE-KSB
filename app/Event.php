<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'title','start_date','end_date','description','link','image'
    ];


    public function photo() {
        return $this->morphOne('App\Photo', 'photoable');
    }
}
