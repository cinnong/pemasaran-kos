<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kos')->unsigned();
            $table->bigInteger('pemilik_kos_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamp('tanggal_pemesanan')->default(now());
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->enum('tipe_kos', ['pria', 'wanita', 'campuran']);
            $table->integer('per_bulan');
            $table->integer('harga');
            $table->integer('total_biaya');
            $table->enum('aksi', ['Pending','Setuju', 'Tidak setuju']);
            $table->timestamps();
            // Foreign key constraint
            $table->foreign('id_kos')->references('id')->on('datakos');
            $table->foreign('pemilik_kos_id')->references('id')->on('pemilik_kos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
};
