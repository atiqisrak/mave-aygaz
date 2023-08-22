<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('navbars', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('menu_id')->nullable();
        $table->unsignedBigInteger('logo_id');
        $table->timestamps();

        $table->foreign('menu_id')->references('id')->on('menus')->onDelete('set null');
        $table->foreign('logo_id')->references('id')->on('media')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('navbars');
}
};
