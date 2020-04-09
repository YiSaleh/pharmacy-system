<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('date_of_birth')->nullable(); 
            $table->bigInteger('national_id')->unique();  
            $table->enum('gender', array('Female', 'Male'));
            $table->boolean('is_banned')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->string('phone',100);
            // $table->unsignedBigInteger('pharmacy_id');
            // $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onDelete('cascade');

          

        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
