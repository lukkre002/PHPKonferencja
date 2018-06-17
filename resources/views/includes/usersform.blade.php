<div class="tableUsers">

    <form method="POST" action="{{ url('/users') }}">
        {{ csrf_field() }}


    <table class="table table-hover">

        <tr class="table-active">
            {{--<td>Id</td>--}}
            <td>Imię</td>
            <td>Nazwisko</td>
            <td>E-mail</td>
            <td>Telefon</td>
            <td>Miejscowość</td>
            <td>Kod-pocztowy</td>
            <td>Ulica</td>
            <td>Rola</td>
            <td>Status</td>
            <td>Utworzony
            <td>Zmiana statusu</td>

        </tr>

        @foreach($data as $value)

            <tr>
                {{--<td>{{  $value->nr_uzykownika  }}</td>--}}
                <td>{{  $value->imie  }}</td>
                <td>{{  $value->nazwisko  }}</td>
                <td>{{  $value->email  }}</td>
                <td>{{  $value->telefon  }}</td>
                <td>{{  $value->miejscowosc  }}</td>
                <td>{{  $value->kod_pocztowy }}</td>
                <td>{{  $value->ulica  }}</td>
                <td>{{  $value->rola  }}</td>
                <td>
                    @if( $value->status==0 )
                        Niezatwierdzony
                    @else
                        Zatwierdzony
                    @endif
                </td>
                <td>{{  $value->created_at  }}</td>


                @if( $value->status==0 )
                    <td><a><button type="submit" class="btn btn-primary" name="action" value= {{  $value->nr_uzykownika }}>Zatwierdź</button></a>
                @else
                    <td><a><button type="submit" class="btn btn-primary" name="action" value= {{  $value->nr_uzykownika }}>Anuluj</button></a>
                @endif



            </tr>

        @endforeach

        <td><a><button type="submit" class="btn btn-primary" name="action" value="Recenzent">Recenzenci</button></a>
        <td><a><button type="submit" class="btn btn-primary" name="action" value="Autor">Autorzy</button></a>
        <td><a><button type="submit" class="btn btn-primary" name="action" value="Administrator">Wszyscy</button></a>
        <td><a><button type="submit" class="btn btn-primary" name="action" value="raport">Generuj raport</button></a>



    </table>
    </form>
</div>