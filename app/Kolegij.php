<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kolegij extends Model
{
    use SoftDeletes;

    protected $table = 'kolegiji';

    protected $fillable = ['naziv', 'opis'];

    public function predavanja()
    {
        return $this->hasMany('App\Predavanje',  'kolegij_id');
    }

}
