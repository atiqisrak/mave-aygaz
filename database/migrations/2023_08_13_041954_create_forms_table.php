<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn');
            $table->text('description_en');
            $table->text('description_bn');
            $table->json('fields');
            $table->string('submit_direction')->nullable();
            $table->boolean('status')->default(false);

            $table->unsignedBigInteger('formable_id')->nullable();
            $table->string('formable_type')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
