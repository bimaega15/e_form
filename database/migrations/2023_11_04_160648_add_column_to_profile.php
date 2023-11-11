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
        Schema::table('profile', function (Blueprint $table) {
            $table->string('code_profile', 50);
            $table->integer('jabatan_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->integer('category_office_id')->unsigned();

            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('unit')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_office_id')->references('id')->on('category_office')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile', function (Blueprint $table) {
            $table->dropColumn('code_profile');
            $table->dropColumn('jabatan_id');
            $table->dropColumn('unit_id');
            $table->dropColumn('category_office_id');
        });
    }
};
