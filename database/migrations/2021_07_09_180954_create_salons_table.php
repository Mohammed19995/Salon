<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->foreignId('branch_id')->constrained('salon_branches');
            $table->unsignedInteger('city_id')->nullable();
            $table->json('address');
            $table->foreignId('image_id')->nullable()->constrained('galleries');
            $table->string('phone_code' , 6);
            $table->string('phone');
            $table->string('email');
            $table->tinyInteger('status')->default(1);

            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('salons');
    }
}
