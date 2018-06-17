<?php
/**
 * Created by PhpStorm.
 * User: Olek
 * Date: 18.06.2018
 * Time: 00:23
 */

namespace App\Http\Controllers;

use App\CriticModel;
use Illuminate\Http\Request;
use DB;


class SelectCriticController  extends Controller
{

    public function addCritic (Request $request)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        $idCritic=$request->input('action');
        $idFiles=$_SESSION["idFiles"];


        $data=array(
            'nr_recenzenta' => $idCritic,
            'nr_artykulu' => $idFiles
        );


        CriticModel::insert($data);

        DB::table('filetable')->where('id', $idFiles)->update(['nr_recenzenta' => $idCritic]);

        return redirect('/')->with('response','Recenzent został przydzielony! ');
    }



    public function selectCritic (Request $request)
    {
        $idFiles=$request->input('action');

        if(!isset($_SESSION))
        {
            session_start();
        }
        $_SESSION["idFiles"] = $idFiles;


        $users['users'] = DB::table('uzytkowniks')->where(['rola'=>"Recenzent"])->get();

        return view('/selectCritic',$users);
    }
}