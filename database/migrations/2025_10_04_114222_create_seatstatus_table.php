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
        Schema::create('seatstatus', function (Blueprint $table) {
            $table->bigIncrements('seat_status_id');
            $table->unsignedBigInteger('seat_id');
            $table->foreign('seat_id')->references('seat_id')->on('seats');
            $table->unsignedBigInteger('showtime_id');
            $table->foreign('showtime_id')->references('showtime_id')->on('showtimes');
            $table->enum('status', ['available', 'booked']);
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
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
        Schema::dropIfExists('seatstatus');
    }
};
