<?php
/**
 * Created by PhpStorm.
 * User: Olek
 * Date: 17.06.2018
 * Time: 23:04
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use DB;
use App\FileModel;

class DownloadController extends Controller
{
    public function download(Request $request)
    {
       $fileName= $request->input('action');

       $destinationPath = 'up_file';

       



       return redirect('/')->with('response',$fileName);

    }

}