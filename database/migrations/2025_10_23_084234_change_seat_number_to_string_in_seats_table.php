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
        Schema::table('seats', function (Blueprint $table) {
            $table->string('seat_number', 10)->change();
        });
    }

    public function down()
    {
        Schema::table('seats', function (Blueprint $table) {
            $table->string('seat_number', 10)->change();
        });
    }
};
