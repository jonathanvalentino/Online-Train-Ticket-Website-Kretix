<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tiket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kereta');
            $table->string('jenis');
            $table->string('asal');
            $table->string('tujuan');
            $table->time('berangkat');
            $table->time('sampai');
            $table->double('harga');

            $table->string('GA1');
            $table->string('GB1');
            $table->string('GC1');

            $table->string('GA2');
            $table->string('GB2');
            $table->string('GC2');

            $table->string('GA3');
            $table->string('GB3');
            $table->string('GC3');

            $table->string('GA4');
            $table->string('GB4');
            $table->string('GC4');

            $table->string('GA5');
            $table->string('GB5');
            $table->string('GC5');

            $table->string('GA6');
            $table->string('GB6');
            $table->string('GC6');

            $table->string('GA7');
            $table->string('GB7');
            $table->string('GC7');
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
