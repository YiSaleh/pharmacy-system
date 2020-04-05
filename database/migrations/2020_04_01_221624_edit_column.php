<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class EditColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
    public function up()
    {
        // Schema::create('useraddresses', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('street_name');
        //     $table->integer('building_no');
        //     $table->integer('floor_no');
        //     $table->integer('flat_no');
        //     $table->boolean('is_main');	
            
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('useraddresses');
    }
}
