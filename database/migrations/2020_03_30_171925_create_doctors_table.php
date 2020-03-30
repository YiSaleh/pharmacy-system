<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('name',100);
            $table->string('email',100)->unique();
            $table->string('password',100)->unique();
            $table->string('national_id',100)->unique();
            $table->string('avatar')->default('default.jpg');
            $table->boolean('is_banned');
            $table->boolean('is_owner');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
