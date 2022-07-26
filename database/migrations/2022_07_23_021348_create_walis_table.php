<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto');
            $table->unsignedBigInteger('id_siswa');
            // MEMBUAT FK ID_SISWA YANG MENGACU KPD FIELD ID DI TABLE SISWAS
            $table->foreign('id_siswa')->references('id')->on('siswas')
            ->onDelete('CASCADE');
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
        Schema::dropIfExists('walis');
    }
}
