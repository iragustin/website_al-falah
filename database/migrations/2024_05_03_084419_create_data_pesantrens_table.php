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
        Schema::create('data_pesantren', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_santri')->default(0);
            $table->integer('jumlah_pendidik')->default(0);
            $table->integer('jumlah_kependidikan')->default(0);
            $table->integer('jumlah_rombongan')->default(0);
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
        Schema::dropIfExists('data_pesantren');
    }
};
