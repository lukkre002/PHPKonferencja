@include('includes.header')
<div class="tableUsers">
    <form method="POST" action="{{ url('/surveylist/survey') }}">
        {{ csrf_field() }}
 
    <table class="table table-hover">
 
        <tr class="table-active">
            <td width="100">Numer ankiety</td>
            <td>Tytuł Ankiety</td>
        </tr>
 
        @foreach($data as $value)
            <tr>
                <td>{{  $value->ankieta_id  }}</td>
                <td>{{  $value->ankieta_tytul  }}
                <a><button type="submit" class="btn btn-primary" name="id" value= {{  $value->ankieta_id }}>Wypełnij!</button></a>

            </tr>
        @endforeach
 
    </table>
    </form>
</div>
@include('includes.footer')