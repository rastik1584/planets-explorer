<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('planet_id');
            $table->string('mood');
            $table->string('weather');
            $table->float('gps_lat');
            $table->float('gps_lng');
            $table->text('note');

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
        Schema::dropIfExists('log_books');
    }
}
