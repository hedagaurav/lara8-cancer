<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('enquiries');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->longText('treatment')->nullable()->default(null);
            $table->longText('old_treatment')->nullable()->default(null);
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
        Schema::dropIfExists('treatment_plans');
    }
}
