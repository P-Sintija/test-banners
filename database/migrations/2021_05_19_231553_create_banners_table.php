<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('position');
            $table->text('file_name');
            $table->text('file_path');
            $table->text('original_file_name');
            $table->string('url');
            $table->string('redirect');
        });
    }

    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
