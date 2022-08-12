<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('advertiser_id');
            $table->unsignedBigInteger('category_id');
            $table->date('start_date');
            $table->timestamps();

            $table->foreign('advertiser_id')->references('id')->on('advertisers')
            ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
