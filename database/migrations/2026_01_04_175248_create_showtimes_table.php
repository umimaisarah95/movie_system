<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id('showtime_id');
            $table->unsignedBigInteger('movie_id');
            $table->date('show_date');
            $table->time('show_time');
            $table->timestamps();

            // Foreign key
            $table->foreign('movie_id')
                ->references('movie_id')
                ->on('movies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('showtimes');
    }
};
