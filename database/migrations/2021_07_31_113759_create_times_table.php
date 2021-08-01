<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('imagem');
            $table->integer('pts')->default(0);
            $table->integer('j')->default(0);
            $table->integer('v')->default(0);
            $table->integer('e')->default(0);
            $table->integer('d')->default(0);
            $table->integer('gp')->default(0);
            $table->integer('gc')->default(0);
            $table->integer('sg')->default(0);
            $table->integer('cv')->default(0);
            $table->integer('ca')->default(0);
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
        Schema::dropIfExists('times');
    }
}
