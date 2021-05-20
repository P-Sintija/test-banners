<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDragAndDropImagesTable extends Migration
{
    public function up()
    {
        Schema::create('drag_and_drop_images', function (Blueprint $table) {
            $table->increments('id');
            $table->text('filename');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('drag_and_drop_images');
    }
}
