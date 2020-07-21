<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    public $timestamps = false;

    protected $fillable = [
        'title','date','description','link'
    ];


    public function photo() {
        return $this->morphOne('App\Photo', 'photoable');
    }
}
