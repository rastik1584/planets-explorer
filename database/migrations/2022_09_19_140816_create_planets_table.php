<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rotation_period');
            $table->string('orbital_period');
            $table->integer('diameter');
            $table->string('climate');
            $table->string('gravity');
            $table->string('terrain');
            $table->string('surface_water');
            $table->string('population');

            $table->timestamps();
            $table->softDeletes();
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

