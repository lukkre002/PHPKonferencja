<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Uzytkownik;
use DB;
use Illuminate\Support\Facades\Hash;
 
 
class ViewSurveysController extends Controller
{
 
    public function getSurveys(Request $request)
    {
        $data['data'] = DB::table('ankieta')->get();
 
        if (count($data) > 0)
        {
            return view('surveylist', $data);
        }
        else
        {
            return view('surveylist');
        }
    }
    public function openSurvey(Request $request)
    {
        $id= $request->get("id");

        $data['data'] = DB::table('ankieta_pytanie')->where(['ankieta_id'=>$id])->get();

        return view('/survey', $data);
    }
}