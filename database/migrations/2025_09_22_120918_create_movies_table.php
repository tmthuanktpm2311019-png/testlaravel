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
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('movie_id');
            $table->string('title',255);
            $table->mediumText('description');
            $table->string('duration',255)->comment('thời lượng phim tính bằng phút vd:120p');
            $table->date('release_date');
            $table->mediumText('poster_url');
            $table->mediumText('bg_url');
            $table->enum('status', ['coming_soon', 'now_showing'])->default('coming_soon');
            $table->string('category',255);
            $table->string('actor',255);
            $table->string('diretor');
            $table->string('country',255);
            $table->mediumText('trailer_url');
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
        Schema::dropIfExists('movies');
    }
};
