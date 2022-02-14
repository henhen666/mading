<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXAKLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('x__a_k_l_s', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('kelas_Id');
        //     $table->integer('hadir');
        //     $table->integer('sakit');
        //     $table->integer('izin');
        //     $table->integer('alpa');
        //     $table->timestamps();
        // });
        Schema::dropIfExists('x__a_k_l_s');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
