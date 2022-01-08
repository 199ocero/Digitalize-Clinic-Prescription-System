<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clinician extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicians', function (Blueprint $table) {
            $table->id();
            $table->string('clinician_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('sex');
            $table->string('civil_status');
            $table->string('address');
            $table->date('birthdate');
            $table->string('height');
            $table->string('weight');
            $table->string('blood_type');
            $table->string('contact_number');
            $table->string('clinic_name');
            $table->string('email');
            $table->string('ptr_number');
            $table->string('license_number');
            $table->string('image');
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
        //
    }
}
