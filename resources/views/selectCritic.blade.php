@include('includes.header')

<div class="tableUsers">

    <form method="POST" action="{{ url('/selectCritic/add') }}">
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
                <td>Utworzony</td>
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
                    <td>{{  $user->created_at  }}</td>

                    <td><a><button type="submit" class="btn btn-primary" name="action" value= {{  $user->nr_uzykownika }}>Wybierz</button></a>

                </tr>

            @endforeach





        </table>
    </form>
</div>

@include('includes.footer')