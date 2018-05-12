<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class LogController extends Controller
{
    public function login(Request $req)
    {
        $email= htmlspecialchars($req->input('email'));
        $password = htmlspecialchars($req->input('password'));

        //return redirect('/')->with('response', $email."----".$password);

        $checklogin= DB::table('uzytkowniks')->where(['email'=>$email])->get();

        $hashedPassword="pass";
        foreach ($checklogin as $checkloginone) {
            $hashedPassword=$checkloginone->haslo;
        }

        //return redirect('/')->with('response', $email."----".$hashedPassword);

        if ((Hash::check($password, $hashedPassword)) && (count($checklogin) == 1) )
        {
            return redirect('/')->with('response', 'Zalogowano');            
        }
        else
        {
             return redirect('/')->with('responseError', 'Błędnie podane dane spróbuj ponownie lub zarejestruj się');
        }

        
    }

    function index()
    {
    	return view('index');
    }  


    ///????
    function logout()
    {
     Auth::logout();
     return redirect('index');
    }

}
