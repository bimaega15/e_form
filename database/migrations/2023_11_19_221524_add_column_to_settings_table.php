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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('setting_acountemail');
            $table->string('setting_acountpassword');
            $table->string('setting_namapengirim');
            $table->string('setting_subject');
            $table->text('setting_contentemail');
            $table->string('setting_penutupemail');
            $table->string('setting_copyright');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
            $table->dropColumn('setting_acountemail');
            $table->dropColumn('setting_acountpassword');
            $table->dropColumn('setting_namapengirim');
            $table->dropColumn('setting_subject');
            $table->dropColumn('setting_contentemail');
            $table->dropColumn('setting_penutupemail');
            $table->dropColumn('setting_copyright');
        });
    }
};
