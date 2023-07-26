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
            $table->string('image');
            $table->string('title_bn')->nullable();
            $table->string('title_en');
            $table->text('description_bn')->nullable();
            $table->text('description_en');
            $table->string('link_url');
            $table->timestamps();
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
