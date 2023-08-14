<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutogasPageTable extends Migration
{
    public function up()
    {
        Schema::create('autogas_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->json('card_id_array1')->nullable();
            $table->string('title2')->nullable();
            $table->text('description2')->nullable();
            $table->json('card_id_array2')->nullable();
            $table->json('short_descriptions');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('autogas_pages');
    }
}
