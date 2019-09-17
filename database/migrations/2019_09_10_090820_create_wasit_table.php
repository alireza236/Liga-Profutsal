<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWasitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wasit', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('foto');
            $table->string('email');
            $table->integer('id_assuransi');
            $table->enum('lisensi',['Pro A','Pro B','Regional']);
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
        Schema::dropIfExists('wasit');
    }
}
