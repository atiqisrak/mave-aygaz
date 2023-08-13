<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutPageTable extends Migration
{
    public function up()
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->string('banner')->nullable();
            $table->text('description')->nullable();
            $table->json('card_id_array')->nullable();
            $table->string('title')->nullable();
            $table->json('card_id_array_2')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_pages');
    }
}