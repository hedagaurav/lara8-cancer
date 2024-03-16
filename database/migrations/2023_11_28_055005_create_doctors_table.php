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
//            $table->integer('user_id');
//            $table->string('fullname');
//            $table->string('email')->unique();
//            $table->string('password');
            $table->foreignId('user_id')->constrained('users');
            $table->string('specialization');
//            $table->string('username')->unique();
            $table->softDeletes(); // Add soft delete support
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
        Schema::dropIfExists('doctors');
    }
}
