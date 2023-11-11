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
        Schema::create('data_statis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_datastatis', 50)->nullable();
            $table->string('nama_datastatis');
            $table->string('jenisreferensi_datastatis');
            $table->integer('parentid_datastatis')->nullable();
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
        Schema::dropIfExists('data_statis');
    }
};
