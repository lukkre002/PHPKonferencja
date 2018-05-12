<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LogController extends Controller
{
    public function login(Request $req)
    {
        $email= htmlspecialchars($req->input('email'));
        $password = htmlspecialchars($req->input('password'));

        //return redirect('/')->with('response', $email."----".$password);

        $checklogin= DB::table('uzytkowniks')->where(['email'=>$email,'haslo'=>$password])->get();

        if(count($checklogin) > 0)
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
