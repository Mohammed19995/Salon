<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('src');
            $table->unsignedInteger('type_id');
            $table->json('name')->nullable();
            $table->string('mime_type' , 250);
            $table->integer('size');
            $table->tinyInteger('show_in_gallery')->default(1);
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('gallery_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
