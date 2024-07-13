<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::create('datakos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pemilik_kos_id')->unsigned();
            $table->string('nama');
            $table->string('lokasi');
            $table->integer('harga');
            $table->integer('jumlah_kamar');
            $table->enum('tipekos', ['pria', 'wanita', 'campuran']);
            $table->text('deskripsi');
            $table->string('notlp');
            $table->integer('nomor_rekening');
            $table->string('foto')->nullable();
            $table->enum('status', ['Setuju', 'Pending', 'Tidak setuju']);
            $table->timestamps();
            $table->foreign('pemilik_kos_id')->references('id')->on('pemilik_kos')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::dropIfExists('datakos');
    }
};
