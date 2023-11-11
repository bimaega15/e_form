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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo_settings')->nullable();
            $table->string('icon_settings')->nullable();
            $table->string('perusahaan_settings')->nullable();
            $table->string('nama_settings');
            $table->text('alamat_settings');
            $table->text('deskripsi_settings')->nullable();
            $table->string('nohp_settings', 30);
            $table->integer('bahasa_settings')->unsigned();
            $table->integer('zonawaktu_settings')->unsigned();
            $table->string('email_settings');
            $table->string('facebook_settings')->nullable();
            $table->string('instagram_settings')->nullable();
            $table->string('linkedin_settings')->nullable();
            $table->string('whatsapp_settings')->nullable();
            $table->string('youtube_settings')->nullable();
            $table->string('longitude_settings');
            $table->string('latitude_settings');
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
        Schema::dropIfExists('settings');
    }
};
