<?php

namespace App\Http\Controllers;

use App\UserKolegij;
use App\Dolazak;
use App\Predavanje;
use App\User;
use App\Kolegij;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id)
    {
        $kolegij = Kolegij::where('id', '=', $id)->first();

        return view('studenti.dodaj', ['id'=>$kolegij->id]);
    }

    public function search(Request $request)    
    {
        $usersInKolegij = UserKolegij::where('kolegij_id','=', $request->id)->get();
        $ignorirajUsers = [];
        foreach ($usersInKolegij as $u) {
            $ignorirajUsers[]=$u->user_id;
        }
    
        $q = $request->get ( 'q' );
	    if($q != ""){
		    $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->orderBy('name')->get()->except($ignorirajUsers);
		    if (count ( $user ) > 0)
			    return view ( 'studenti.dodaj' )->withDetails ( $user )->withQuery ( $q );
		    else
			    return view ( 'studenti.dodaj' )->withMessage ( 'Nije pronađeno. Pokušajte opet !' );
            }
        else{
             $user = User::orderBy('name')->get()->except($ignorirajUsers);
             return view ( 'studenti.dodaj' )->withDetails ( $user )->withQuery ( 'prikaži sve' );
            }
    }

    public function edit_form(Request $request,$id)
    {
        $user=User::find($id);

        return view('profil.uredi_profil')->with('user',$user);
    }

    public function edit(Request $request,$id)
    {
        $user = User::find($id);
        $user->email = $request->email;

        $user->save();

        return redirect(route("kolegiji.pogled"));

    }

}
