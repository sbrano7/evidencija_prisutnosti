<?php

namespace App\Http\Controllers;


use App\Kolegij;
use App\UserKolegij;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KolegijController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kolegiji = Kolegij::get();

        return view('kolegiji.pogled', ['kolegiji' => $kolegiji,]);
    }

    public function create_form()
    {
        return view('kolegiji.dodaj');
    }

    public function edit_form(Request $request, $id)
    {
        $kolegij = Kolegij::find($id);

        return view('kolegiji.uredi')->with('kolegij', $kolegij);
    }

    public function create(Request $request)
    {


        $data=request()->validate([
            'naziv'=> ['required' ],
            'opis'=> ['required' ]
        ]);

        $kolegij= new Kolegij();
        $kolegij->naziv = $request->naziv;
        $kolegij->opis = $request->opis;
        $kolegij->save();
        $kolegij->fresh();

        $user_kolegij = new UserKolegij();
        $user_kolegij ->user_id = Auth::user()->id;
        $user_kolegij ->kolegij_id = $kolegij->id;
        $user_kolegij ->save();

        return redirect(route("kolegiji.pogled"));
    }

    public function edit(Request $request, $id)
    {
        $kolegij = Kolegij::find($id);
        $kolegij->naziv = $request->naziv;
        $kolegij->opis = $request->opis;
        $kolegij->save();

        return redirect(route("kolegiji.pogled"));
    }

    public function delete(Request $request, $id)
    {
        $kolegij = Kolegij::find($id);
        $kolegij->delete();

        return redirect(route("kolegiji.pogled"));
    }

}
