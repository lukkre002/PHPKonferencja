<!DOCTYPE html>

<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<html>

<head>
    <title>
        Raport uzytkownikow
    </title>

    <style type="text/css">
        table{
            width: 90%;
            margin: 0 auto;
            font-size: small;

        }
    </style>

</head>
<body>
<table>
    <caption><h1> Informacje o uzytkownikach:
            @if(($_SESSION["wybor_uzytkownikow"])=="Administrator")
            Autor i recenzent
            @else
                {{$_SESSION["wybor_uzytkownikow"] }}
            @endif



        </h1></caption>
    <thead>
    <tr>
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>E-mail</th>
        <th>Telefon</th>
        <th>Kod-pocztowy</th>
        <th>Miejscowosc</th>
        <th>Ulica</th>
    </tr>
    </thead>

    <tbody>
        @foreach($usersPDF as $key => $user)

            <tr>

                <td>{{ $user->imie}}</td>
            <td>{{ $user->nazwisko}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->telefon}}</td>
            <td>{{ $user->kod_pocztowy}}</td>
            <td>{{ $user->miejscowosc}}</td>
            <td>{{ $user->ulica}}</td><


            </tr>


        @endforeach

    </tbody>
</table>
</body>

</html>