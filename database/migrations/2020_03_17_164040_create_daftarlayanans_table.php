<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarlayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftarlayanans', function (Blueprint $table) {
            $table->bigIncrements('iddaftar');
            
            $table->unsignedbigInteger('idlayanan');
            $table->foreign('idlayanan')->references('idlayanan')->on('layanans')->onDelete('cascade');

            $table->unsignedbigInteger('idkapasitas');
            $table->foreign('idkapasitas')->references('idkapasitas')->on('kapasitas')->onDelete('cascade');

            $table->unsignedbigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');

            $table->integer('jumlahpeserta');

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
        Schema::dropIfExists('daftarlayanans');
    }
}
