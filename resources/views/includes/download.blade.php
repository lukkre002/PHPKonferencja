<div class="tableUsers">

    {{--<form method="POST" action="{{ url('/uploadfile') }}">--}}
        {{--{{ csrf_field() }}--}}


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
                <td>Tytuł</td>
                <td>Data dodania</td>



            </tr>

            @foreach($files as $file)

                <tr>
                  <?php
                    $UserId=$file->userid;

                    $users= DB::table('uzytkowniks')->where(['nr_uzykownika'=>$UserId])->get();

                      foreach($users as $s)
                      {
                          $user=$s;
                      }

                      ?>

                    <td>{{  $user->imie  }}</td>
                    <td>{{  $user->nazwisko  }}</td>
                    <td>{{  $user->email  }}</td>
                    <td>{{  $user->telefon  }}</td>
                    <td>{{  $user->miejscowosc  }}</td>
                    <td>{{  $user->kod_pocztowy }}</td>
                    <td>{{  $user->ulica  }}</td>
                    <td>{{  $file->file_title }}</td>
                    <td>{{  $file->date }}</td>


                    <td>  <a href="up_file/{{$file->file_name}}" download="{{$file->file_name}}">
                            <button type="button" class="btn btn-primary">
                                <i class="glyphicon glyphicon-download">
                                    Pobierz
                                </i>
                            </button>

                        </a></td>

                </tr>

            @endforeach




        </table>
    </form>
</div>
