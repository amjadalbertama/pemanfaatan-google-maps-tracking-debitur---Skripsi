<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebiturTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debitur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('no_kontrak');
            
            $table->string('nama_debitur');
            $table->date('tgl_lahir');
            $table->enum('kelamin',['L','P']);
            $table->string('no_ktp');
            $table->string('no_npwp');
            $table->string('kewarganegaraan');
            $table->enum('status_perkawinan', ['menikah','belum menikah','duda/janda']);
            $table->integer('jmlh_tanggungan');
            $table->enum('pendidikan_terakhir', ['SMA','Akademi/Diploma','S1','S2/S3','Lainya']);
            $table->string('alamat_ktp');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->integer('kodepos');
            $table->string('alamat_tinggal');
            $table->string('kelurahan_at');
            $table->string('kecamatan_at');
            $table->string('kota_at');
            $table->string('provinsi_at');
            $table->integer('kodepos_at');
            $table->enum('status_hunian', ['kontrak/sewa','milik pribadi', 'milik keluarga', 'rumah dinas','kos']);
            $table->string('lama_tinggal_thn');
            $table->string('lama_tinggal_bln');
            $table->string('email',128)->unique();
            $table->string('no_seluler');
            $table->string('no_telp_rumah');
            $table->string('nama_ibu_kandung');
            $table->string('latitude');
            $table->string('longitude');

            $table->integer('no_agreement');
            $table->date('tgl_kontrak');
            $table->date('tgl_berakhir');
            $table->integer('bunga');
            $table->integer('tenor');
            $table->integer('angsuran_bulan');
            $table->integer('total_pinjaman');
            $table->integer('sisa_pinjaman');
            $table->enum('kolektabilitas', ['1','2', '3', '4','5']);
           
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
        Schema::dropIfExists('debitur');
    }
}
