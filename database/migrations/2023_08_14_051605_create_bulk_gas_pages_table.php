<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bulk_gas_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn');

            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');

            $table->json('tabs');

            $table->string('title2_en');
            $table->string('title2_bn');

            $table->string('description_en');
            $table->string('description_bn');

            $table->json('cards_id');
            $table->json('cards2_id');
            $table->json('cards3_id');

            $table->string('title3_en');
            $table->string('title3_bn');

            $table->json('cards4_id');

            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }
    

    
    public function down(): void
    {
        Schema::dropIfExists('bulk_gas_pages');
    }
};
