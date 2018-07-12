<?php namespace Awebsome\Watermark\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class UpdateImagesTable extends Migration
{
    public function up()
    {
        Schema::table('awebsome_watermark_images', function ($table) {
            $table->dropColumn('properties');
        });
    }

    public function down()
    {
        Schema::table('awebsome_watermark_images', function ($table) {
            $table->json('properties')->nullable();
        });
    }
}
