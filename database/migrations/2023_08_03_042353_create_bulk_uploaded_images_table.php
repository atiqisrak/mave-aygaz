<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulkUploadedImagesTable extends Migration
{
    public function up()
    {
        Schema::create('bulk_uploaded_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bulk_uploaded_images');
    }
}
