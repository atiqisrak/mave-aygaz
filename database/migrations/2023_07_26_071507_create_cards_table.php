<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->nullable();
            $table->unsignedBigInteger('media_ids');
            $table->string('title_en');
            $table->string('title_bn');
            $table->text('description_en');
            $table->text('description_bn');
            $table->string('link_url')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
            
            $table->foreign('media_ids')->references('id')->on('media');
        });
        
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
