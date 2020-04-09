<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
         Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',100);
        });
         Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',100);
            $table->enum('periority', array('High', 'Medium', 'Low'));
            $table->unsignedBigInteger('area_id');
            // $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            // $table->softDeletes();  
        });
         Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street_name');
            $table->integer('building_no');
            $table->integer('floor_no');
            $table->integer('flat_no');
            $table->boolean('is_main'); 
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->unsignedBigInteger('area_id');
            // $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
          Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status',100);
            $table->string('prescription',100);
            $table->boolean('is_insured');
            // $table->unsignedBigInteger('user_address_id');
            // $table->foreign('user_address_id')->references('id')->on('user_addresses')->onDelete('cascade');
            // $table->unsignedBigInteger('pharmacy_id');
            // $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');

        });
         Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name',100);
            $table->string('type',50);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('quantity');

        });
         

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('database_tables');
    }
}
