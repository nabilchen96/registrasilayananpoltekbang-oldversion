<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->bigIncrements('idtagihan');
            $table->string('nopembayaran');
            $table->unsignedbigInteger('iddaftar');
            $table->foreign('iddaftar')->references('iddaftar')->on('daftarlayanans')->onDelete('cascade');
            $table->date('tgltagihan');
            $table->date('tgljatuhtempo');
            $table->enum('status',['lunas','belum lunas','kadaluarsa']);
            $table->integer('jumlahbayar');
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
        Schema::dropIfExists('tagihans');
    }
}
