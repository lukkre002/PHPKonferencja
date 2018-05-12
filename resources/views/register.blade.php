@include('includes.header')




<div class="formCntr">
  <form method="POST" action="{{ url('/register/registerAdd') }}">
  {{ csrf_field() }}
  




    <fieldset>
         <h3 align="center">Rejestracja</h3><br />

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

      @if(count($errors) > 0)
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">{{$error}}</div>
        @endforeach 
      @endif


<div class="tablee">
      <div class="form-group">
        <label for="InputName1">Imię</label>
        <input class="form-control" name="name" id="InputName1" aria-describedby="Help" placeholder="Wpisz imie" >
      </div>

      <div class="form-group">
        <label for="InputSurname1">Nazwisko</label>
        <input class="form-control" name="surname" id="InputSurname1" aria-describedby="Help" placeholder="Wpisz nazwisko" >
      </div>

      <div class="form-group">
        <label for="InputNumber1">Telefon</label>
        <input class="form-control"  name="number"  id="InputNumber1" aria-describedby="Help" placeholder="Wpisz swój numer telefonu" >
      </div>

      <div class="form-group">
        <label for="InputEmail1">Adres e-mail</label>
        <input class="form-control" name="email" id="InputEmail1" aria-describedby="Help" placeholder="Wpisz swój email" type="email">
      </div>

      <div class="form-group">
        <label for="InputName1">Kod-pocztowy</label>
        <input class="form-control" name="code" id="InputCode1" aria-describedby="Help" placeholder="Podaj kod pocztowy" >
      </div>

      <div class="form-group">
        <label for="InputName1">Miejscowość</label>
        <input class="form-control" name="city" id="InputPlace1" aria-describedby="Help" placeholder="Podaj miejscowość" >
      </div>

      <div class="form-group">
        <label for="InputName1">Ulica</label>
        <input class="form-control" name="street" id="InputStreet1" aria-describedby="Help" placeholder="Podaj ulicę i nr domu/mieszkania" >
      </div>

      <div class="form-group">
        <label for="InputPassword1">Wpisz hasło</label>
        <input class="form-control" name="password1" id="InputPassword1" placeholder="Podaj swoje hasło" type="password">
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Wpisz ponownie hasło</label>
        <input class="form-control" name="password2" id="InputPassword2" placeholder="Podaj ponownie swoje hasło" type="password">
      </div>

      <div class="form-group">
        <label for="Select1">Wybierz swoją funkcję</label>
        <select class="form-control" name="select" id="Select1">
          <option>Autor</option>
          <option>Recenzent</option>
        </select>
      </div>

     <div class="g-recaptcha" data-sitekey="6Lcqk1MUAAAAAFCGUcyCcVYNH9WKejP5ikvl4zLJ"/>
       
  </div>
      <div align="center" >
        <button type="submit" class="btn btn-primary">Zarejestruj</button>
      </div>

  </form>       
</div>



@include('includes.captcha')
@include('includes.footer')