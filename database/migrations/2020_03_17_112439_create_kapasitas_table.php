<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKapasitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kapasitas', function (Blueprint $table) {
            $table->bigIncrements('idkapasitas');

            $table->unsignedbigInteger('idlayanan');
            $table->foreign('idlayanan')->references('idlayanan')->on('layanans')->onDelete('cascade');

            $table->string('jadwal');
            $table->integer('kapasitas');

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
        Schema::dropIfExists('kapasitas');
    }
}
