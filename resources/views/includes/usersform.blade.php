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

            @foreach($users as $user)

                <tr>
                    {{--<td>{{  $value->nr_uzykownika  }}</td>--}}
                    <td>{{  $user->imie  }}</td>
                    <td>{{  $user->nazwisko  }}</td>
                    <td>{{  $user->email  }}</td>
                    <td>{{  $user->telefon  }}</td>
                    <td>{{  $user->miejscowosc  }}</td>
                    <td>{{  $user->kod_pocztowy }}</td>
                    <td>{{  $user->ulica  }}</td>
                    <td>{{  $user->rola  }}</td>
                    <td>
                        @if( $user->status==0 )
                            Niezatwierdzony
                        @else
                            Zatwierdzony
                        @endif
                    </td>
                    <td>{{  $user->created_at  }}</td>


                    @if( $user->status==0 )
                        <td><a><button type="submit" class="btn btn-primary" name="action" value= {{  $user->nr_uzykownika }}>Zatwierdź</button></a>
                    @else
                        <td><a><button type="submit" class="btn btn-primary" name="action" value= {{  $user->nr_uzykownika }}>Anuluj</button></a>
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