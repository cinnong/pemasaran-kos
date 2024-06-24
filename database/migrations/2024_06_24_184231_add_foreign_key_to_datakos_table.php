<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToDatakosTable extends Migration
{
    public function up()
    {
        Schema::table('datakos', function (Blueprint $table) {
            // Define foreign key
            $table->foreign('pemilik_kos_id')
                  ->references('id')
                  ->on('pemilik_kos')
                  ->onDelete('cascade'); // Set ON DELETE CASCADE
        });
    }

    public function down()
    {
        Schema::table('datakos', function (Blueprint $table) {
            // Drop the foreign key constraint if needed
            $table->dropForeign(['pemilik_kos_id']);
        });
    }
}
