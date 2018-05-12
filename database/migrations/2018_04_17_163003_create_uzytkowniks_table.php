<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUzytkowniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uzytkowniks', function (Blueprint $table) {
            $table->increments('nr_uzykownika');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('email');
            $table->string('telefon');
            $table->string('kod_pocztowy');
            $table->string('miejscowosc');
            $table->string('ulica');
            $table->string('rola');
            $table->string('haslo');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uzytkowniks');
    }
}
