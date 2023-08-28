<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormablesTable extends Migration
{
    public function up()
    {
        Schema::create('formables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->unsignedBigInteger('formable_id');
            $table->string('formable_type');
            $table->timestamps();

            $table->unique(['form_id', 'formable_id', 'formable_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('formables');
    }
}
