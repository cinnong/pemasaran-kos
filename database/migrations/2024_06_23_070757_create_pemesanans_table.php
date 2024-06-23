<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamp('tanggal_pemesanan')->default(now());
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->enum('tipe_kos', ['pria', 'wanita', 'campuran']);
            $table->integer('per_bulan');
            $table->integer('harga');
            $table->integer('total_biaya');
            $table->enum('status_pemesanan', ['Dipesan', 'Dikonfirmasi', 'Dibatalkan', 'Selesai'])->default('Dipesan');
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default(now())->onUpdate(now());

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
};
