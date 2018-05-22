@include('includes.header')

<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
      @if(session('response'))
        <div class="col-md-8 alert alert-success">
          {{session('response')}}
        </div>
      @endif

      @if(session('responseError'))
        <div class="col-md-8 alert alert-danger">
          {{session('responseError')}}
        </div>
      @endif


<!-- <h1>Witaj w naszej stronie konferencyjnej</h1> -->



    @if(!(isset($_SESSION["login"])) || $_SESSION["login"] == "FALSE"  )
        <div class="textIndex">
             <a  href="/konferencja/public/register">Jeszcze nie zarejestrowany?</a>
        </div>
    @else
        <div class="textHello">
            <a  href="">  Witaj, {{ ($_SESSION["username"]) }}!  </a>
        </div>
    @endif






@if(!(isset($_SESSION["login"])) || $_SESSION["login"] == "FALSE"  )
    @include('includes.login')
@endif



@include('includes.footer')