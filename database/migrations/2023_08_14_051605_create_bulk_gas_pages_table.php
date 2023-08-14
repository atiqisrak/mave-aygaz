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
            $table->string('title');
            $table->string('banner');
            $table->string('title2');
            $table->string('description2');
            $table->json('section2_cards');
            $table->json('section3_cards');
            $table->string('title4');
            $table->json('section4_cards');
            $table->string('title5');
            $table->json('section5_cards');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }
    

    
    public function down(): void
    {
        Schema::dropIfExists('bulk_gas_pages');
    }
};
