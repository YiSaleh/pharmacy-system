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
        });

         Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street_name');
            $table->integer('building_no');
            $table->integer('floor_no');
            $table->integer('flat_no');
            $table->boolean('is_main'); 
        });

          Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status',100);
            $table->string('prescription',100);
            $table->boolean('is_insured');
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
