<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uzytkownik;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LogController;

class ViewUsersController extends Controller
{

    public function getUsers(Request $request)
    {
        session_start();

        if(!(isset($_SESSION["login"])) || $_SESSION["login"] == "FALSE"  ) {

            return redirect('/')->with('responseError', 'Musisz się zalogować!');
        }
        elseif (!($_SESSION["userrole"] == "Administrator" ))
        {
            return redirect('/')->with('responseError', 'Nie jesteś administratorem!');
        }

        else
        {
            $data['data'] = DB::table('uzytkowniks')->get();


            if (count($data) > 0)
            {
                return view('users', $data);
            }
            else
            {
                return view('users');
            }

        }
    }


    public function setStatusUsers(Request $request)
    {
        $id = $_POST['id'];
        $status = $_POST['status'];
        $user = DB::table('uzytkowniks')->where(['nr_uzykownika'=>$id])->get();


        if ($status == false) {
           // return redirect('/')->with('responseError', '000000');
            DB::table('uzytkowniks')->where('nr_uzykownika', $id)->update(array('status' => true));
        } else {
            DB::table('uzytkowniks')->where('nr_uzykownika', $id)->update(array('status' => false));
            //return redirect('/')->with('responseError', '11111');
        }

        $data['data'] = DB::table('uzytkowniks')->get();
        return view('/users', $data);
    }
}
