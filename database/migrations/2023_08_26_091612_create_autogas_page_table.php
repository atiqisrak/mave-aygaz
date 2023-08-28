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
            $table->string('title_en');
            $table->string('title_bn');

            $table->unsignedBigInteger('media_id');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');

            $table->string('title2_en');
            $table->string('title2_bn');

            $table->string('description_en');
            $table->string('description_bn');

            $table->string('title3_en');
            $table->string('title3_bn');

            $table->json('cards_id');

            $table->string('title4_en');
            $table->string('title4_bn');

            $table->json('cards2_id');

            $table->string('title5_en');
            $table->string('title5_bn');

            $table->json('cards3_id');

            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('autogas_pages');
    }
}
