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
        Schema::create('theaters', function (Blueprint $table) {
            $table->bigIncrements('theater_id');
            $table->string('name',255);
            $table->string('address',255);
            $table->string('city',255);
            $table->string('phone_number',255);
            $table->string('email',255);
            $table->integer('total_screens')->comment('Số lượng phòng chiếu trong rạp');
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
        Schema::dropIfExists('theaters');
    }
};
