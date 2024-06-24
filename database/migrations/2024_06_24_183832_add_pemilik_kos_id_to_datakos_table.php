<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPemilikKosIdToDatakosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datakos', function (Blueprint $table) {
            // Tambahkan kolom pemilik_kos_id
            $table->unsignedBigInteger('pemilik_kos_id')->after('id'); // Sesuaikan posisi kolom sesuai kebutuhan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datakos', function (Blueprint $table) {
            // Hapus kolom pemilik_kos_id saat rollback
            $table->dropColumn('pemilik_kos_id');
        });
    }
}
