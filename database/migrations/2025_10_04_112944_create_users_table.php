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
        Schema::create('users', function (Blueprint $table) {
           $table->bigIncrements('id'); //Khóa chính
            $table->string('name', 255);
            $table->string('username', 128)->unique()->nullable();
            $table->string('password', 255);
            $table->string('email', 500)->unique();
            $table->string('phone', 20)->unique()->nullable(); // cho phép bỏ trống
            $table->date('birthday')->nullable(); // cho phép bỏ trống
            $table->tinyInteger('gender')->default(0); // 0: Nam, 1: Nữ, 2: Khác
            $table->mediumText('avatar')->nullable(); // ảnh có thể null
            $table->tinyInteger('status')->default(1); // 1: active, 0: inactive
            $table->string('remember_token',100)->nullable();
            $table->string('active_code',255)->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
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
        Schema::dropIfExists('users');
    }
};
