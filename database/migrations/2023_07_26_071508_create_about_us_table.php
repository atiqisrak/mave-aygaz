<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title_bn')->nullable();
            $table->string('title_en')->default('');
            $table->text('description_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->string('cta_button_text_bn')->nullable();
            $table->string('cta_button_text_en')->nullable();
            $table->string('cta_button_url_bn')->nullable();
            $table->string('cta_button_url_en')->nullable();
            $table->string('image', 255);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
