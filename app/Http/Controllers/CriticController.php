<?php
/**
 * Created by PhpStorm.
 * User: Olek
 * Date: 18.06.2018
 * Time: 02:26
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Uzytkownik;
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
    public function saveCritices(Request $request)
    {
        $rules = array(
            'wstep' => 'required',
            'rozwiniecie' => 'required',
            'zakonczenie' => 'required'
        );
        $message = array(
            'wstep.required' => 'Pole wstep jest wymagane!',
            'rozwiniecie.required' => 'Pole rozwiniecie jest wymagane!',
            'zakonczenie.required' => 'Pole zakonczenie jest wymagane!'
        );

        $validator = $this->validate($request, $rules, $message);



        $wstep = $request->input('wstep');
        $rozwiniecie = $request->input('rozwiniecie');
        $zakonczenie = $request->input('zakonczenie');

        if(!isset($_SESSION))
        {
            session_start();
        }

        $idCritic =$_SESSION["idCriti"] ;

        DB::table('recenzja')->where('id', $idCritic)->update(['wstep' => $wstep]);
        DB::table('recenzja')->where('id', $idCritic)->update(['rozwiniecie' => $rozwiniecie]);
        DB::table('recenzja')->where('id', $idCritic)->update(['zakonczenie' => $zakonczenie]);
        DB::table('recenzja')->where('id', $idCritic)->update(['status' => 1]);

        return redirect('/')->with('response','Recenzja wypełniona poprawnie!');

    }


}