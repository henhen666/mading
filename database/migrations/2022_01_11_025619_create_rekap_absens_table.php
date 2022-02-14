<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_absens', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('kelas_id');
            $table->string('kelas');
            $table->integer('hadir');
            $table->integer('sakit')->nullable();
            $table->integer('izin')->nullable();
            $table->integer('alpa')->nullable();
            // $table->string('tanggal');
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
        Schema::dropIfExists('rekap_absens');
    }
}
