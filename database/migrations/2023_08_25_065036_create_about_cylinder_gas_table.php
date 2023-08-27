<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCylinderGasTable extends Migration
{
    public function up()
    {
        Schema::create('about_cylinder_gas', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_bn');

            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');

            $table->json('tabs');

            $table->unsignedBigInteger('card_id')->nullable();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

            $table->unsignedBigInteger('media2_id')->nullable();
            $table->foreign('media2_id')->references('id')->on('media')->onDelete('cascade');

            $table->unsignedBigInteger('card2_id')->nullable();
            $table->foreign('card2_id')->references('id')->on('cards')->onDelete('cascade');


            $table->string('title2_en');
            $table->string('title2_bn');

            $table->string('subtitle_en');
            $table->string('subtitle_bn');

            $table->json('cards_id');


            $table->string('title3_en');
            $table->string('title3_bn');

            $table->string('subtitle2_en');
            $table->string('subtitle2_bn');

            $table->json('cards2_id');

            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_cylinder_gas');
    }
}
