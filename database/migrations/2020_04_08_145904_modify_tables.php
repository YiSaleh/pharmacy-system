<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::table('users', function (Blueprint $table) {
          $table->unsignedBigInteger('pharmacy_id')->nullable();
    

        });
       Schema::table('pharmacies', function (Blueprint $table) {
           $table->unsignedBigInteger('owner_id');
           $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->softDeletes();
        });
        Schema::table('user_addresses', function (Blueprint $table) {
           $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
        Schema::table('orders', function (Blueprint $table) {
           $table->unsignedBigInteger('user_address_id');
            $table->foreign('user_address_id')->references('id')->on('user_addresses')->onDelete('cascade');
            $table->unsignedBigInteger('pharmacy_id')->nullable();
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
