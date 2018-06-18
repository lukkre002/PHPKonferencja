@include('includes.header')
<div class="formCntr">
    <form method="POST" action="{{ url('/writeCritic/save') }}">

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


            <div class="tableUsers">
                <div class="form-group">
                    <label for="wstep">Wstęp</label>
                    <textarea class="form-control" name="wstep" id="wstep" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="rozwiniecie">Rozwinięcie</label>
                    <textarea class="form-control" name="rozwiniecie" id="rozwiniecie" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="zakonczenie">Zakończenie</label>
                    <textarea class="form-control" name="zakonczenie" id="zakonczenie" rows="3"></textarea>
                </div>

                <div align="center" >
                    <button type="submit" class="btn btn-primary">Zapisz</button>
                </div>
            </div>


    </form>
</div>

@include('includes.footer')