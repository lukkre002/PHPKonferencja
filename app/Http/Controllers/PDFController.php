<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;

class PDFController extends Controller
{
    public static function getPDF()
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
            $usersPDF = DB::table('uzytkowniks')->where('rola', '!=', $wybor)->get();
        }
        else
        {
            $usersPDF = DB::table('uzytkowniks')->where(['rola'=>$wybor])->get();
        }


//        $usersPDF = DB::table('uzytkowniks')->where('rola', '!=', "Administrator")->get();


        $pdf=PDF::loadView('pdf.usersPDF',['usersPDF' => $usersPDF]);
        return $pdf->download('usersPDF.pdf');
    }
}
