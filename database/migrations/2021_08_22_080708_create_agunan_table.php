<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgunanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agunan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('no_agreement');
            $table->BigInteger('debitur_id')->unsigned();
            $table->date('tgl_kontrak');
            $table->date('tgl_berakhir');
            $table->integer('bunga');
            $table->integer('tenor');
            $table->integer('angsuran_bulan');
            $table->integer('total_pinjaman');
            $table->integer('sisa_pinjaman');
            $table->enum('kolektabilitas', ['1','2', '3', '4','5']);
            $table->timestamps();

            $table->foreign('debitur_id')->references('id')->on('debitur')

            ->onDelete('cascade');
    
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agunan');
    }
}
