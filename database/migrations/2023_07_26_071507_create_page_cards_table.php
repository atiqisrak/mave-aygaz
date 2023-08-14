<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('page_cards', function (Blueprint $table) {
            $table->id();
            $table->string('page_name');
            $table->unsignedBigInteger('media_id');
            $table->string('title_bn')->nullable();
            $table->string('title_en');
            $table->text('description_bn')->nullable();
            $table->text('description_en');
            $table->string('link_url');
            $table->boolean('status')->default(true);
            $table->timestamps();
            
            $table->foreign('media_id')->references('id')->on('media');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_cards');
    }
};
