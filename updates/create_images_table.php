<?php namespace Awebsome\Watermark\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('awebsome_watermark_images', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('src_id')->unsigned();
            $table->string('path', 255);
            $table->string('size');
            $table->string('disk_name');

            $table->json('properties')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('awebsome_watermark_images');
    }
}
