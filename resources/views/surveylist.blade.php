@include('includes.header')
<div class="tableUsers">
 
 
    <table class="table table-hover">
 
        <tr class="table-active">
            <td width="100">Numer ankiety</td>
            <td>Tytuł Ankiety</td>
        </tr>
 
        @foreach($data as $value)
            <tr>
                <td>{{  $value->ankieta_id  }}</td>
                <td>{{  $value->ankieta_tytul  }}                <a><button type="submit" class="btn btn-primary" >Wypełnij!</button></a>
                    <input type="hidden" name="id" value= {{  $value->ankieta_id }} /></td>

            </tr>
        @endforeach
 
    </table>
 
</div>
@include('includes.footer')