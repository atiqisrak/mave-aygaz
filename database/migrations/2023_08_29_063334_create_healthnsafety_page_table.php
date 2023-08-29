<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('healthnsafety_page', function (Blueprint $table) {
            $table->id();

            $table->string('title_en');
            $table->string('title_bn');

            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');

            $table->json('tabs');

            $table->string('description_en');
            $table->string('description_bn');

            $table->string('title1_en');
            $table->string('title1_bn');

            $table->json('iconlist');

            $table->unsignedBigInteger('media2_id');
            $table->foreign('media2_id')->references('id')->on('media')->onDelete('cascade');

            $table->string('title2_en');
            $table->string('title2_bn');

            $table->unsignedBigInteger('media3_id');
            $table->foreign('media3_id')->references('id')->on('media')->onDelete('cascade');

            $table->json('iconlist2');

            $table->string('title3_en');
            $table->string('title3_bn');

            $table->json('cards_id');

            $table->json('cards2_id');

            $table->string('title4_en');
            $table->string('title4_bn');

            $table->string('description2_en');
            $table->string('description2_bn');

            $table->json('iconlist3');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healthnsafety_page');
    }
};
