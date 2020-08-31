<?php

namespace App\Http\Controllers;

use App\UserKolegij;
use App\Dolazak;
use App\Predavanje;
use App\User;
use App\Kolegij;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    public function edit_form(Request $request)
    {
        
        return view('profil.promjeni_sifru');
    }


    public function provjera(array $data)
    {

      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|same:password|min:8',
        'password_confirmation' => 'required|same:password',     
      ]);
    
      return $validator;
    } 


    public function edit(Request $request)
    {

        $request_data = $request->All();
        $validator = $this->provjera($request_data);
        
        if($validator->fails())
        {
            
            echo "<script>";
            echo "alert('Greška, pokušajte opet unijeti novu šifru ( treba imati više od 8 znakova i treba biti točno ponovljeno unešena');";
            echo "</script>";
            
            return view('profil.promjeni_sifru');
        }
        else
        {  
          $current_password = Auth::User()->password;           
          if(Hash::check($request_data['current-password'], $current_password))
          {           
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save(); 
            
            echo "<script>";
            echo "alert('Uspješna promjena šifre');";
            echo "</script>";
            
            return view('profil.promjeni_sifru');
          }
          else
          {           
            echo "<script>";
            echo "alert('Greška, pokušajte opet upisati točnu trenutnu šifru')";
            echo "</script>";
            
            return  view('profil.promjeni_sifru');
          }
        }        
      }
         

}

