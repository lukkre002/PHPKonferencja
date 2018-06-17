<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uzytkownik;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LogController;
use function Sodium\add;

class ViewUsersController extends Controller
{
    
    public function useButton(Request $request)
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        switch ($request->input('action')) {
            case 'Autor':
                    $wybor="Autor";
                    $_SESSION["wybor_uzytkownikow"] = $wybor;
                    return $this->getUsers();
                break;

            case 'Recenzent':
                    $wybor="Recenzent";
                    $_SESSION["wybor_uzytkownikow"] = $wybor;
                    return $this->getUsers();
                break;
            case 'Administrator':
                    $wybor="Administrator";
                    $_SESSION["wybor_uzytkownikow"] = $wybor;
                    return $this->getUsers();
                break;
            case 'raport':

                return PDFController::getPDF();

                break;
            default:
                return $this->setStatusUsers($request->input('action'));
                break;

        }
    }



    public function getUsers()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }

        if(!(isset($_SESSION["login"])) || $_SESSION["login"] == "FALSE"  )
        {
            return redirect('/')->with('responseError', 'Musisz się zalogować!');
        }
        elseif (!($_SESSION["userrole"] == "Administrator" ))
        {
            return redirect('/')->with('responseError', 'Nie jesteś administratorem!');
        }

        else

        {
           if((isset($_SESSION["wybor_uzytkownikow"])))
           {
               $wybor=$_SESSION["wybor_uzytkownikow"];
           }
           else
           {
               $wybor="Administrator";
           }


            if ($wybor=="Administrator")
            {
                $users['users'] = DB::table('uzytkowniks')->where('rola', '!=', $wybor)->get();
            }
            else
            {
                $users['users'] = DB::table('uzytkowniks')->where(['rola'=>$wybor])->get();
            }

            if (count($users) > 0)
            {
                return view('users', $users );
            }
            else
            {
                return view('users');
            }

        }
    }


    public function setStatusUsers($id)
    {
      // $id= $request->get("id");

       $users = DB::table('uzytkowniks')->where(['nr_uzykownika'=>$id])->get();


        foreach ($users as $user) {
            $status=$user->status;
        }

        if ($status == false) {
            DB::table('uzytkowniks')->where('nr_uzykownika', $id)->update(array('status' => true));
        } else {
            DB::table('uzytkowniks')->where('nr_uzykownika', $id)->update(array('status' => false));

        }


        return $this->getUsers();
//
//        $data['data'] = DB::table('uzytkowniks')-> where('rola', '!=', 'Administrator')->get();
//
//        return view('/users', $data);
    }
}
