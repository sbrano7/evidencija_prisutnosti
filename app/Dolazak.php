<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dolazak extends Model
{
    protected $table = 'dolasci';

    protected $fillable = ['user_id', 'predavanje_id'];


    public function user()
    {
        return $this->belongsTo('App\User',  'user_id');
    }


    public function predavanje()
{
    return $this->belongsTo('App\predavanje',  'predavanje_id');
}

}
