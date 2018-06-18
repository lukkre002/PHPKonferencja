<!DOCTYPE html>
<html><script src='https://www.google.com/recaptcha/api.js'></script>
<head>


  <style type="text/css">
    body{
      background-image: url('backg.jpg');
      background-size: cover;
    }
  </style>


  <title>Konferencja</title>
  <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('css/style.css')}}">
  <script type="text/javascript" scr="{{ url('js/bootstrap.js') }}" ></script>
  <script type="text/javascript" scr="{{ url('js/jquery-3.1.0.js') }}" ></script>
  <script type="text/javascript" scr="{{ url('js/jquery-ui.js') }}" ></script>

  <script>
      $( function() {
          $( "#datepicker" ).datepicker();
      } );
  </script>

</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

  <div class="viewPage">

    <a class="navbar-brand" href="/konferencja/public/">Konferencje</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">

      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="/konferencja/public/">Strona główna <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/konferencja/public/viewCritics">Recenzje</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/konferencja/public/uploadfile">Artykuły</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/konferencja/public/surveylist">Ankiety</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/konferencja/public/users">Użytkownicy <span class="sr-only">(current)</span></a>
        </li>

          <?php
          if(!isset($_SESSION))
          {
              session_start();
          }
          ?>

        @if((isset($_SESSION["login"])) && $_SESSION["login"] == "TRUE"  )

          <div style='text-align:right'>
            <li class="nav-item"  >
              <a class="nav-link" href="/konferencja/public/logout">Wyloguj się  [ {{ ($_SESSION["username"]) }} ]  <span class="sr-only">(current)</span></a>
            </li>
          </div>

        @endif


      </ul>





    </div>
</nav>