<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['choices','nantional ID','dateofbirth']);
            $table->timestamp('date_of_birth')->nullable(); 
            $table->integer('national_id')->unique();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         
    }
}
