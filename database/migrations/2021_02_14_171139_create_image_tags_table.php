<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("tag_id");
            $table->unsignedBigInteger("photo_id");
            $table->foreign("tag_id")->references("id")->on("tags");
            $table->foreign("photo_id")->references("id")->on("photos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_tags');
    }
}
