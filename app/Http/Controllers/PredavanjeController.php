<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Kolegij;
use App\Predavanje;
use Illuminate\Http\Request;

class PredavanjeController extends Controller
{
    public function index($id)
    {


        $predavanja =Predavanje::where('kolegij_id', '=', $id)->get();
        $kolegij = Kolegij::where('id', '=', $id)->first();
        return view('predavanja.pogled', ['predavanja' => $predavanja,'kolegij' => $kolegij]);
    }



    public function create_form()
    {

        return view('predavanja.dodaj');
    }

    public function edit_form(Request $request, $id)
    {
        $predavanje = Predavanje::find($id);

        return view('predavanja.uredi')->with('predavanje', $predavanje);
    }

    public function create(Request $request)
    {
        $predavanje= new Predavanje();
        $predavanje->naziv = $request->naziv;
        $predavanje->opis = $request->opis;
        $predavanje->vrijeme = Carbon::now();
        $predavanje->kolegij_id=$request->id;
        $predavanje->save();



        return redirect(route("predavanja.pogled",$request->id));


    }

    public function edit(Request $request, $id)
    {
        $predavanje = Predavanje::find($id);
        $predavanje->naziv = $request->naziv;
        $predavanje->opis = $request->opis;
        $predavanje->vrijeme = $request->vrijeme;
        $predavanje->save();

        return redirect(route("predavanja.pogled",$predavanje->kolegij_id));

    }

    public function delete(Request $request, $id)
    {
        $predavanje = Predavanje::find($id);
        $predavanje->delete();

        return redirect(route("predavanja.pogled",$predavanje->kolegij_id));

    }

}
