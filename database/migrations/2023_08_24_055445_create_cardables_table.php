<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('cardables', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('card_id');
        $table->unsignedBigInteger('cardable_id');
        $table->string('cardable_type');
        $table->timestamps();

        $table->unique(['card_id', 'cardable_id', 'cardable_type']);
    });
}

    public function down(): void
    {
        Schema::dropIfExists('cardables');
    }
};
