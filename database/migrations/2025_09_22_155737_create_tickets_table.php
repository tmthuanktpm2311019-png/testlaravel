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
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('acl_users');
            $table->unsignedBigInteger('showtime_id');
            $table->foreign('showtime_id')->references('showtime_id')->on('showtimes');
            //Thời gian đặt vé
            $table->dateTime('booking_time')->comment('Thời gian đặt vé');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'paid', 'cancelled'])->comment('pending: đang giữ chổ, paid: đã thanh toán, cancelled: hủy');
            // - pending → đang giữ chỗ
            // - paid → đã thanh toán
            // - cancelled → hủy
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
        Schema::dropIfExists('tickets');
    }
};
