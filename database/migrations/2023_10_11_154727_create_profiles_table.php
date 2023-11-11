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
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();

            $table->string('nik_profile');
            $table->string('nama_profile');
            $table->string('email_profile')->nullable();
            $table->text('alamat_profile');
            $table->string('nohp_profile', 35);
            $table->enum('jeniskelamin_profile', ['L', 'P']);
            $table->string('gambar_profile')->nullable();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('profile');
    }
};
