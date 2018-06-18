<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Session;
use Redirect;
use DB;
use App\FileModel;


class UploadController extends Controller
{



    public function getView(){
        session_start();

        if(!(isset($_SESSION["login"])) || $_SESSION["login"] == "FALSE"  ) {

            return redirect('/')->with('responseError', 'Musisz się zalogować!');
        }
        elseif (($_SESSION["userrole"] == "Recenzent" ))
        {
            return redirect('/')->with('responseError', 'Nie masz tutaj dostępu!');
        }

        $userid = $_SESSION["userID"];

        if (($_SESSION["userrole"] == "Autor" ))
        {
            $files['files'] = DB::table('filetable')->where(['userid'=>$userid])->get();
        }
        else
        {
            $files['files'] = DB::table('filetable')->get();
        }


        return view('uploadfile',$files);

    }

    public function insertFile(){
        session_start();



        $filetitle=Input::get('file_title');
        $file= Input::file('filenam');
        $userid = $_SESSION["userID"];


        $rules = array(
            'file_title' => 'required',
            'filenam' => 'required|max:10000|mimes:pdf'
        );





        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            $messages = $validator->messages();
            return Redirect::to('uploadfile')->withInput()->withErrors($validator);

        }else if ($validator->passes()){

            if (Input::file('filenam')->isValid()) {

                $extension = Input::file('filenam')->getClientOriginalExtension();

                $ldate = date('Y-m-d H:i:s');
                $filename = rand(11111,99999).'.'.$extension;

                $destinationPath = 'up_file';


                $data=array(
                    'file_title' => $filetitle,
                    'file_name' => $filename,
                    'userid' => $userid,
                    'date' => $ldate,

                );


                FileModel::insert($data);


                $upload_success = $file->move($destinationPath, $filename);
                $notification = array(
                    'message' => 'Plik został dodany pomyślnie!',
                    'alert-type' => 'success'
                );

                return Redirect::to('uploadfile')->with($notification);


            }
            else {


                $notification = array(
                    'message' => 'Wystąpił błąd w trakcie dodawania pliku!',
                    'alert-type' => 'error'
                );

                return Redirect::to('uploadfile')->with($notification);
            }
        }



    }
}
