<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();

            $table->string('title_en');
            $table->string('title_bn');
            $table->tinyInteger('footer_status')->default(0);
            // Column 1
            $table->string('logo');
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

            // Column 2
            $table->string('column2_title_en');
            $table->string('column2_title_bn');
            $table->json('column2_links_en')->nullable();
            $table->json('column2_links_bn')->nullable();
            $table->tinyInteger('column2_status')->default(1);

            // Column 3
            $table->string('column3_title1_en');
            $table->string('column3_title1_bn');
            $table->json('column3_links1_en')->nullable();
            $table->json('column3_links1_bn')->nullable();
            $table->string('column3_title2_en');
            $table->string('column3_title2_bn');
            $table->json('column3_logos')->nullable();
            $table->tinyInteger('column3_status')->default(1);

            // Column 4
            $table->string('column4_title_en');
            $table->string('column4_title_bn');
            $table->string('column4_image');
            $table->string('column4_text_en');
            $table->string('column4_text_bn');
            $table->string('column4_link');
            $table->string('column4_description_en');
            $table->string('column4_description_bn');
            $table->tinyInteger('column4_status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer');
    }
};
