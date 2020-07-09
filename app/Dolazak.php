<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dolazak extends Model
{
    protected $table = 'dolasci';

    protected $fillable = ['user_id', 'predavanje_id'];

}
