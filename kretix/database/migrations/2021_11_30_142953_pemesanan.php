<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('id_tiket');
            $table->string('nama_pemesan');
            $table->string('jumlah_orang');
            $table->string('nama_kereta');
            $table->string('jenis_kereta');
            $table->string('asal');
            $table->string('tujuan');
            $table->date('tanggal_berangkat');
            $table->time('jam_berangkat');
            $table->double('harga');
            $table->string('nama1');
            $table->string('nama2');
            $table->string('nama3');
            $table->string('nama4');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
