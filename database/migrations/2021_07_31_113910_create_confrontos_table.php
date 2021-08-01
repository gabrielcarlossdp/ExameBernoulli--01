<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfrontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confrontos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_casa');
            $table->integer('gols_casa')->default(0);
            $table->integer('cv_casa')->default(0);
            $table->integer('ca_casa')->default(0);
            $table->integer('id_fora');
            $table->integer('gols_fora')->default(0);
            $table->integer('cv_fora')->default(0);
            $table->integer('ca_fora')->default(0);
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
        Schema::dropIfExists('confrontos');
    }
}
