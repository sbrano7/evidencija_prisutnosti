<?php

namespace App\Http\Controllers;

use App\Kolegij;
use App\User;
use App\UserKolegij;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserKolegijController extends Controller

{

    public function create(Request $request)
    {
        $userkolegij= new UserKolegij();
        $userkolegij->user_id =$request->user_id;
        $userkolegij->kolegij_id =$request->kolegij_id;
        $userkolegij->save();

        return redirect(route("kolegiji.pogled"));
    }

}
