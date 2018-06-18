<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class LogController extends Controller
{

    public function login(Request $req)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        ///injection
        $email= htmlspecialchars($req->input('email'));
        $password = htmlspecialchars($req->input('password'));

        //return redirect('/')->with('response', $email."----".$password);

        $checklogin= DB::table('uzytkowniks')->where(['email'=>$email])->get();

        foreach ($checklogin as $checkloginone) {
            $hashedPassword=$checkloginone->haslo;
            $role=$checkloginone->rola;
            $name=$checkloginone->imie;
            $userId=$checkloginone->nr_uzykownika;
            $status=$checkloginone->status;
        }

        //return redirect('/')->with('response', $email."----".$hashedPassword);


        if(!isset($status))
        {
            return redirect('/')->with('responseError', 'Błędnie podane dane spróbuj ponownie lub zarejestruj się');
        }
        elseif($status == 0)
        {
            return redirect('/')->with('responseError', 'Twoje konto nie zostało jeszcze aktywowane przez administratora');
        }

        elseif ((Hash::check($password, $hashedPassword)) && (count($checklogin) == 1) ) {

                $_SESSION["login"] = "TRUE";
                $_SESSION["username"] = $name;
                $_SESSION["userrole"] = $role;
                $_SESSION["userID"] = $userId;
                return redirect('/')->with('response', 'Zalogowano');

        }
        else
        {
            $_SESSION["login"] = "FALSE";
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
        $_SESSION["login"] = "FALSE";
        session_start();
        session_unset();
        session_destroy();
        return redirect('/')->with('response', 'Pomyślnie wylogowano!');
    }

}
