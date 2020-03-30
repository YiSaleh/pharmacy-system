<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacyusers', function (Blueprint $table) {
            $table->id();
            $table->integer('nantional ID')->unique();
            $table->string('name',100);
            $table->string('phone',100);
            $table->enum('choices', array('Female', 'Male'));
            $table->string('email',100)->unique();
            $table->string('password',100)->unique();
            $table->string('avatar')->default('default.jpg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacyusers');
    }
}
