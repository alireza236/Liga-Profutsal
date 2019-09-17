<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstraintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
        Schema::table('player', function (Blueprint $table) {
            $table->foreign('id_club')->references('id')->on('club');
            $table->foreign('id_assuransi')->references('id')->on('assuransi');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player', function (Blueprint $table) {
            $table->dropForeign('player_id_club_foreign');
            $table->dropForeign('player_id_assuransi_foreign');
        });
    }
}
