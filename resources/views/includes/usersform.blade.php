<div class="formCntr">

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
            @if( $value->rola!='Administrator' )

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
                    <td><a><button type="submit" class="btn btn-primary" >Zatwierdź</button></a>
                @else
                    <td><a><button type="submit" class="btn btn-primary" >Anuluj</button></a>
                @endif
                        <input type="hidden" name="id" value= {{  $value->nr_uzykownika }} />
                        <input type="hidden" name="status" value= {{  $value->status }} />





            </tr>
            @endif
        @endforeach

    </table>
    </form>
</div>