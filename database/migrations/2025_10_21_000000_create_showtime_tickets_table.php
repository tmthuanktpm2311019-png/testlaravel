<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('showtime_tickets', function (Blueprint $table) {
            $table->bigIncrements('showtime_ticket_id');
            $table->unsignedBigInteger('showtime_id');
            $table->unsignedBigInteger('ticket_id');
            $table->timestamps();

            $table->foreign('showtime_id')
                ->references('showtime_id')
                ->on('showtimes')
                ->onDelete('cascade');

            $table->foreign('ticket_id')
                ->references('ticket_id')
                ->on('tickets')
                ->onDelete('cascade');

            $table->unique(['showtime_id', 'ticket_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtime_tickets');
    }
};