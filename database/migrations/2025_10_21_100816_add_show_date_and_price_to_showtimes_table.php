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
        Schema::table('showtimes', function (Blueprint $table) {
            $table->date('show_date')->after('room_id')->nullable();
            $table->decimal('price', 10, 0)->after('start_time')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('showtimes', function (Blueprint $table) {
            $table->dropColumn('show_date');
            $table->dropColumn('price');
        });
    }
};
