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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('lokasi', 255);
            $table->decimal('harga', 10, 2);
            $table->enum('status', ['available', 'occupied', 'under_maintenance'])->default('available');
            $table->integer('jumlah_kamar')->default(0);
            $table->json('fasilitas_yang_tersedia')->nullable();
            $table->text('deskripsi');
            $table->string('informasi_kontak', 255)->nullable();
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
        Schema::dropIfExists('properties');
    }
};
