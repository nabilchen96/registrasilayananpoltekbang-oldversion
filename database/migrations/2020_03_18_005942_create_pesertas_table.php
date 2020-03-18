<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->bigIncrements('idpeserta');

            $table->unsignedbigInteger('iddaftar');
            $table->foreign('iddaftar')->references('iddaftar')->on('daftarlayanans')->onDelete('cascade');

            $table->string('nama');

            $table->string('tempatlahir');

            $table->date('tanggallahir');

            $table->text('alamat');

            $table->enum('jeniskelamin',['laki-laki','perempuan']);

            $table->bigInteger('nik');

            $table->string('email');

            $table->string('nohp');

            $table->enum('ijazah',['SMP','SMA']);

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
        Schema::dropIfExists('pesertas');
    }
}
