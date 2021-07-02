<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('service_time')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->foreign('image_id')->references('id')->on('galleries');
            $table->foreign('parent_id')->references('id')->on('categories');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
