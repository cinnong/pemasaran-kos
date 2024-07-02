<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pemesanan_id')->unsigned();
            $table->timestamp('tanggal_pembayaran')->default(now());
            $table->string('upload_bukti_pembayaran');
            $table->enum('status_pembayaran', ['pending', 'berhasil', 'gagal']);
            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('pembayarans');
    }
};
