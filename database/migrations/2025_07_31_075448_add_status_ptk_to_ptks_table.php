<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ptks', function (Blueprint $table) {
            $table->string('status_ptk')->default('pending');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ptks', function (Blueprint $table) {
            $table->dropColumn('status_ptk');
        });
    }

};
