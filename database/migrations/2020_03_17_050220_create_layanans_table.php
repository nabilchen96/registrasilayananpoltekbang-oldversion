<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->bigIncrements('idlayanan');
            $table->string('layanan');
            $table->enum('kategorilayanan',['pelatihan','penyewaan']);
            $table->text('deskripsi');
            $table->enum('kategoriseleksi',['tidak','tidak ketat','ketat']);
            $table->integer('tarifpendaftaran');
            $table->integer('tarifseleksi');
            $table->integer('tarifdaftarulang');
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
        Schema::dropIfExists('layanans');
    }
}
