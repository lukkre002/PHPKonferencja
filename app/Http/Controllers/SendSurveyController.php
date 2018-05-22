<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uzytkownik;
use DB;
use Illuminate\Support\Facades\Hash;


class SendSurveysController extends Controller
{

    public function sendSurveys(Request $request)
    {

        if (count($data) > 0)
        {
            return view('surveylist', $data);
        }
        else
        {
            return view('surveylist');
        }
    }
}