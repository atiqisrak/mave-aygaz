<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedexTable extends Migration
{
    public function up()
    {
        Schema::create('medex', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('entity_id');
            $table->string('entity_type');
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->index(['entity_id', 'entity_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('medex');
    }
}