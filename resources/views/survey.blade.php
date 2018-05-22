@include('includes.header')
<div class="tableUsers">
    <form method="POST" action="{{ url('/survey') }}">
        {{ csrf_field() }}
        <?php

        $i = 1;?>
        @foreach($data as $value)

        <?php printf("%02d",$i);?>.{{  $value->pytanie_tresc  }}<br>
            <div class="form-group">
                <textarea class="form-control" id="TextArea<?php printf("%02d",$i);?>" name="TextArea<?php printf("%02d",$i);?>" rows="3"></textarea>
            </div>
           <?php $i++;

            ?>
        @endforeach
        <br>
        <button type="submit" class="btn btn-primary">Wyślij odpowiedz</button>
        <br>
    </form>
</div>
@include('includes.footer')