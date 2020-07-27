<?php

namespace App\Http\Controllers;
use App\User;
use App\Dolazak;
use App\Predavanje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DolazakController extends Controller
{
    public function predavanja_ucenik($id)
    {
        $predavanja = Predavanje::where('kolegij_id', '=', $id)->get();

        return view('dolasci.pogled_ucenik', ['predavanja' => $predavanja]);
    }


    public function users($id)
    {
        $dolasci =Dolazak::where('predavanje_id', '=', $id)->with(['user'])->get();
        $predavanje = Predavanje::where('id', '=', $id)->with(['kolegij'])->first();
        return view('dolasci.pogled_prof', ['dolasci' => $dolasci, 'predavanje' => $predavanje]);

    }
}


