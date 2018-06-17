@include('includes.header')

{!! Form::open(array('url'=>'insertfile','method'=>'POST' ,'class'=>'form-horizontal','files'=>true)) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="add-file">
    <div class="form-group">


        <label class="control-label col-sm-2" for="name">Tytuł:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control file_title_c" id="file_title_id" name="file_title" placeholder="Wpisz tytuł"  value="{{ Input::old('file_title') }}">

            @if ($errors->has('file_title')) <p class="help-block">{{ $errors->first('file_title') }}</p> @endif

        </div>


    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Wybierz plik:</label>

        <div class="col-sm-4">

            <input type="file"  name="filenam" class="filename">

            @if ($errors->has('filenam')) <p class="help-block">{{ $errors->first('filenam') }}</p> @endif

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" >Załaduj</button>
        </div>
    </div>



    </div>
</div>


{!! Form::close() !!}

{{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}


{{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>--}}

{{--<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">--}}

<script>
            @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>


@include('includes.download')
@include('includes.footer')