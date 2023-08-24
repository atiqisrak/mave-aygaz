<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTable extends Migration
{
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('navbar_id')->nullable();
            $table->unsignedBigInteger('slider_id')->nullable();
            $table->unsignedBigInteger('card_id')->nullable();
            $table->json('cards_id');
            $table->unsignedBigInteger('media_id')->nullable();
            $table->json('media_ids');
            $table->unsignedBigInteger('footer_id')->nullable();
            $table->timestamps();

            $table->foreign('navbar_id')->references('id')->on('navbars')->onDelete('cascade');
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('cascade');
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->foreign('footer_id')->references('id')->on('footers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('homepages');
    }
}
