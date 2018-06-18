<?php
/**
 * Created by PhpStorm.
 * User: Olek
 * Date: 18.06.2018
 * Time: 02:26
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;


class CriticController extends Controller
{

    public function viewCritices()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }


        if(!(isset($_SESSION["login"])) || $_SESSION["login"] == "FALSE"  )
        {
            return redirect('/')->with('responseError', 'Musisz się zalogować!');
        }
        else {
            return view('/viewCritics');
        }
    }
    public function writeCritices(Request $request)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }


        $idCritic=$request->input('action');
        $_SESSION["idCriti"] = $idCritic;


        return view('/writeCritic');

    }


}