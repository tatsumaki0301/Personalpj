<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('shop_id')->constrained('shops');
            $table->foreignId('reserve_id')->nullable()->constrained('reserves');
            $table->foreignId('star_id')->constrained('stars');
            $table->timestamps();
            $table->unique('reserve_id');
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
}
