<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();

            $table->string('title_en');
            $table->string('title_bn');
            $table->tinyInteger('footer_status')->default(0);
            $table->unsignedBigInteger('logo_id');
            $table->string('address1_title_en');
            $table->string('address1_title_bn');
            $table->string('address1_description_en');
            $table->string('address1_description_bn');
            $table->string('address2_title_en');
            $table->string('address2_title_bn');
            $table->string('address2_description_en');
            $table->string('address2_description_bn');
            $table->tinyInteger('address1_status')->default(1);
            $table->tinyInteger('address2_status')->default(1);

            $table->foreign('logo_id')->references('id')->on('media')->onDelete('cascade');

            $table->unsignedBigInteger('column2_menu_id')->nullable();
            $table->foreign('column2_menu_id')->references('id')->on('menus')->onDelete('set null'); // Add foreign key relationship
            $table->tinyInteger('column2_status')->default(1);

            $table->unsignedBigInteger('column3_menu_id')->nullable();
            $table->foreign('column3_menu_id')->references('id')->on('menus')->onDelete('set null'); // Add foreign key relationship

            $table->json('column3_logos');
            $table->tinyInteger('column3_status')->default(1);

            $table->string('column4_title_en');
            $table->string('column4_title_bn');
            $table->unsignedBigInteger('column4_image');
            $table->string('column4_text_en');
            $table->string('column4_text_bn');
            $table->string('column4_link');
            $table->string('column4_description_en');
            $table->string('column4_description_bn');
            $table->tinyInteger('column4_status')->default(1);

            $table->foreign('column4_image')->references('id')->on('media')->onDelete('cascade'); // Add foreign key relationship

            $table->unsignedBigInteger('bottom_menu_id')->nullable();
            $table->foreign('bottom_menu_id')->references('id')->on('menus')->onDelete('set null'); // Add foreign key relationship
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('footers');
    }
}
