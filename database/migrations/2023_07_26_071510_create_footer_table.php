<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('footer', function (Blueprint $table) {
            $table->id();
            $table->string('logo'); // URL to the footer logo image
            $table->text('address');
            $table->json('quick_links'); // JSON array for quick links [{"text": "Contact Us", "url": "/contact"}, ...]
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer');
    }
};
