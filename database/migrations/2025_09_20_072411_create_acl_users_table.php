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
        Schema::create('acl_users', function (Blueprint $table) {
            $table->bigIncrements('id'); //Khoa chinh, tu dong tang, kieu bigint
            $table->string('username',128)->unique();
            $table->string('password',255);
            $table->string('fullname',255);
            $table->string('email',500)->unique();
            $table->string('phone',20)->unique();
            $table->date('birthday');
            $table->tinyInteger('gender');
            $table->mediumText('avatar');
            $table->tinyInteger('status');
            $table->string('remember_token',100)->nullable();
            $table->string('active_code',255);
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
        Schema::dropIfExists('acl_users');
    }
};
