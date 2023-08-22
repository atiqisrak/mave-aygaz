<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        // $table->unsignedBigInteger('menu_items_ids');
        $table->timestamps();

        // $table->foreign('menu_items_ids')->references('id')->on('menu_items');
    });
}

public function down():void
{
    Schema::dropIfExists('menus');
}

};
