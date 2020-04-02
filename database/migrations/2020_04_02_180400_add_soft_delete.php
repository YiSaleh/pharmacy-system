<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddSoftDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  
    public function up()
    {

        Schema::table('useraddresses', function (Blueprint $table) {
            $table->softDeletes();  
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('useraddresses');
        Schema::table('useraddresses', function (Blueprint $table) {

            $table->dropSoftDeletes(); 
        });
    }
}
