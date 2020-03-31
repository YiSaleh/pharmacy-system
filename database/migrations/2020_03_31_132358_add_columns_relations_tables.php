<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsRelationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('doctors', function (Blueprint $table) {
            $table->unsignedBigInteger('pharmacy_id');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacy');
        });

       Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_address_id');
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_address_id')->references('id')->on('useraddresses');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            
                   });
       Schema::table('pharmacy', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');

        });
       Schema::table('useraddresses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
