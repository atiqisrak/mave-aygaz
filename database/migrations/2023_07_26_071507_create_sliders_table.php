<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_bn')->nullable();
            $table->unsignedBigInteger('media_ids');
            $table->tinyInteger('status')->default(false);
            $table->timestamps();

            $table->foreign('media_ids')->references('id')->on('media');

        });
    }

    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
