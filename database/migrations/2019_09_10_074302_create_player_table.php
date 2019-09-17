<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('tanggal_lahir');
            $table->text('address');
            $table->integer('tinggi_bdn');
            $table->integer('berat_bdn');
            $table->integer('id_club')->unsigned();;
            $table->integer('id_assuransi')->unsigned();;
            $table->string('foto');
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
        Schema::dropIfExists('player');
    }
}
