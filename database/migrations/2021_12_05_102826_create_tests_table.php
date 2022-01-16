<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('echocardiogram')->nullable();
            $table->string('electrocardiogram')->nullable();
            $table->string('x_ray')->nullable();
            $table->string('cbc')->nullable();
            $table->string('urinalysis')->nullable();
            $table->string('ultrasound')->nullable();
            $table->string('ct_scan')->nullable();
            $table->string('stool_test')->nullable();
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
        Schema::dropIfExists('tests');
    }
}
