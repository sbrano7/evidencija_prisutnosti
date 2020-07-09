<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predavanje extends Model
{
    protected $table = 'predavanja';

    protected $fillable = ['naziv', 'opis', 'vrijeme' , 'kolegij_id'];

    public function kolegij()
    {
        return $this->belongsTo('App\Kolegij',  'kolegij_id');
    }
}
