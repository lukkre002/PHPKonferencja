
  <div class="boxLogin">
   <h3 align="center">Zaloguj się</h3><br />

   @if(isset(Auth::user()->email))
    <script>window.location="";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

   <form method="post" action="{{ url('/loginme') }}">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">  

    <div class="form-group">
     <label>Podaj adres e-mail</label>
     <input type="email" name="email" class="form-control" />
    </div>

    <div class="form-group">
     <label>Podaj hasło</label>
     <input type="password" name="password" class="form-control" />
    </div>

    <div class="form-group" align="center">
     <input  type="submit" name="login" class="btn btn-primary" value="Zaloguj" />
    </div>

   </form>
  </div>

