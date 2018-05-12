<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uzytkownik;
use DB;
use Illuminate\Support\Facades\Hash;

class RegistersController extends Controller
{

    public function registerAdd(Request $request)
    {
        $secretLocalhost="6LeW5VgUAAAAANnHxEfVhbO8rwYHpOHn3PR_lzLP";

        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretLocalhost.'&response='.$_POST['g-recaptcha-response']);
        $odpowiedz = json_decode($sprawdz);

        $rules = array(
         'name' => 'required',
         'surname' => 'required',
         'number' => 'required',
         'email' => 'required',
         'code' => 'required',
         'city' => 'required',
         'street' => 'required',
         'password1' => 'required|min:8|max:20',
         'password2' => 'required',
         'select' => 'required'
        );
        $message = array(
            'name.required' => 'Pole imię jest wymagane!',
            'surname.required' => 'Pole nazwisko jest wymagane!',
            'number.required' => 'Pole telefon jest wymagane!',
            'email.required' => 'Pole e-mail jest wymagane!',
            'code.required' => 'Podaj swój kod pocztowy!',
            'city.required' => 'Podaj miejscowość zamieszkania!',
            'street.required' => 'Podaj ulicę!',
            'password1.required' => 'Podaj swoje hasło!',
            'password2.required' => 'Podaj ponownie swoje hasło!',
            'select.required' => 'Wybierz swoją rolę!',
            'password1.min' => 'Hasło musi mieć minimum 8 znaków!',
            'password1.max' => 'Hasło może mieć maksymanie 20 znaków!'
        );

        $validator = $this->validate($request, $rules, $message);

        $email= $request->input('email');
        $checklogin= DB::table('uzytkowniks')->where(['email'=>$email])->get();

        if(count($checklogin) > 0)
        {
            return redirect('/register')->with('responseError','Użytkownik o podanym e-mail już istnieje!');
        }

        if ($request->input('password1')!=$request->input('password2'))
        {
            return redirect('/register')->with('responseError','Hasła nie są identyczne!');
        }
        else
        {
             $hashed =  Hash::make($request->input('password1'));
        }


        if ($odpowiedz->success==false)
        {
            return redirect('/register')->with('responseError','Potwierdz, że nie jestes botem!');
        }


        $Uzytkownik = new Uzytkownik;
    	$Uzytkownik->imie = $request->input('name');
    	$Uzytkownik->nazwisko = $request->input('surname');
    	$Uzytkownik->email = $request->input('email');
    	$Uzytkownik->telefon= $request->input('number');
    	$Uzytkownik->kod_pocztowy = $request->input('code');
    	$Uzytkownik->miejscowosc = $request->input('city');
		$Uzytkownik->ulica = $request->input('street');
		$Uzytkownik->rola = $request->input('select');
		$Uzytkownik->haslo = $hashed;
		$Uzytkownik->status = false;

		$Uzytkownik->save();

		return redirect('/')->with('response','Rejestracja zakończona powodzeniem!');
    }


}
