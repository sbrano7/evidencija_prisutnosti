<?php

namespace App\Http\Controllers;

use App\Dolazak;
use App\Predavanje;
use App\User;
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



    public function edit_form(Request $request,$id)
    {
        $user=User::find($id);
        return view('profil.uredi_profil')->with('user',$user);
    }

    public function edit(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect(route("kolegiji.pogled"));

    }


}
