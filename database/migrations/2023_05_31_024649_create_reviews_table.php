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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resto_id');
            $table->foreignId('user_id');
            $table->string('review');
            $table->integer('rating');
            $table->string('review_img');
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("resto_id")->references("id")->on("restos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
