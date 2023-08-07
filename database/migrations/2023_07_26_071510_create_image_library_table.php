<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('image_library', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(1);
            $table->text('image');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('image_library');
    }
};
