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
            $table->string('title1');
            $table->text('description1');
            $table->string('banner_image');
            $table->string('title2');
            $table->text('description2');
            $table->string('video_url');
            $table->string('title3');
            $table->text('description3');
            $table->json('card_id_array1');
            $table->string('title4');
            $table->text('description4');
            $table->json('card_id_array2');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('about_cylinder_gas');
    }
}
