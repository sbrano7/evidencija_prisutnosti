<?php

namespace App\Http\Controllers;

use App\UserKolegij;
use Carbon\Carbon;
use App\Kolegij;
use App\Predavanje;
use App\Dolazak;
use Illuminate\Http\Request;

class PredavanjeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
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

        $data=request()->validate([
            'naziv'=> ['required' ],
            'opis'=> ['required' ],
            'vrijeme'=> ['required' ],
        ]);
        
        $dolasci = [];
        $predavanje= new Predavanje();
        $predavanje->naziv = $request->naziv;
        $predavanje->opis = $request->opis;
        $predavanje->vrijeme = $request->vrijeme;
        $predavanje->kolegij_id=$request->id;
        $predavanje->save();
        
        $kolegiji = UserKolegij::where('kolegij_id', '=', $request->id)->get();
        
        foreach ($kolegiji as $kolegij) {
            $new = [];
            $new['user_id'] = $kolegij->user_id;
            $new['predavanje_id'] =$predavanje->id;
            $new['prisutan'] = 0;
            $new['created_at'] = Carbon::now();
            $new['updated_at'] = Carbon::now();
            $dolasci[] = $new;
        }
        $now = Carbon::now('utc')->toDateTimeString();
        Dolazak::insert($dolasci);

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

}
