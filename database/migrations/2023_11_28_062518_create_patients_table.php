<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            // $table->date('date_of_birth')->nullable();
            // $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('cancer_type')->unsigned();
            $table->text('address')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('pincode');
            $table->text('documents');
            $table->softDeletes();
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
        Schema::dropIfExists('patients');
    }
}
