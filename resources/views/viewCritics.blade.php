@include('includes.header')
<div class="tableUsers">

    <form method="POST" action="{{ url('/writeCritic') }}">
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
                <td>Tytuł</td>
                <td>Data dodania</td>

            </tr>


            <?php

            $UserId= $_SESSION["userID"];
            $critics= DB::table('recenzja')->where(['nr_recenzenta'=>$UserId])->get();

            ?>


            @foreach($critics as $critic)


                <?php
                $idArticle=$critic->nr_artykulu;

                $files= DB::table('filetable')->where(['id'=>$idArticle])->get();

                    foreach ($files as $f)
                    {
                        $file=$f;
                        $idAutor=$f->userid;
                        $autors= DB::table('uzytkowniks')->where(['nr_uzykownika'=>$idAutor])->get();

                    }

                    foreach ($autors as $a)
                    {
                        $user=$a;
                    }
                ?>


                <tr>

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
                            <button type="button" class="btn btn-primary">Pobierz</button>
                        </a></td>

                    <td><a><button type="submit" class="btn btn-primary" name="action" value= {{  $critic->id }}>Wypełnij</button></a></td>

                </tr>

            @endforeach




        </table>
    </form>
</div>

@include('includes.footer')