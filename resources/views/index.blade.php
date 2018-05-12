@include('includes.header')

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

<div class="textIndex">	
	<a  href="/konferencja/public/register">Jeszcze nie zarejestrowany?</a>
</div>

@include('includes.login')
@include('includes.footer')