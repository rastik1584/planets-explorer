<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planet_id');
            $table->string('name');
            $table->string('species_name');
            $table->string('url');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('planet_id')->references('id')->on('planets');
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
