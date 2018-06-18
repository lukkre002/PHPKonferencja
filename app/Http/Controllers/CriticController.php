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
    public function writeCritices(Request $request)
    {
        session_start();



        $idCritic=$request->input('action');

        return redirect('/')->with('responseError', $idCritic);


    }


}