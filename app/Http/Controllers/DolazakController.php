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
        $dolasci = Dolazak::where('user_id', '=', Auth::user()->id )->get();
        
        return view('dolasci.pogled_ucenik', ['predavanja' => $predavanja,'dolasci' => $dolasci]);
    }


    public function users($id)
    {
        $dolasci =Dolazak::where('predavanje_id', '=', $id)->with(['user'])->get();
        $predavanje = Predavanje::where('id', '=', $id)->with(['kolegij'])->first();

        return view('dolasci.pogled_prof', ['dolasci' => $dolasci, 'predavanje' => $predavanje]);

    }


    public function create(Request $request)
    {
        $dolazak= new Dolazak();
        $dolazak->user_id =$request->user_id;
        $dolazak->predavanje_id =$request->predavanje_id;
        $dolazak->prisutan = $request->prisutan;
        $dolazak->save();

        return redirect(route("dolasci.pogled_prof"));


    }

    public function modify(Request $request)
    {
        $dolazak = Dolazak::find($request->id);
        $dolazak->user_id =$request->user_id;
        $dolazak->predavanje_id =$request->predavanje_id;
        $dolazak->prisutan = $request->prisutan;
        $dolazak->save();

        return redirect(route("dolasci.pogled_prof", ['id'=>$dolazak->predavanje_id]));

    }
}


