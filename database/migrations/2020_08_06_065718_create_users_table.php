<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_code');
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->double('lat')->default(0);
            $table->double('lng')->default(0);

            $table->unsignedInteger('city_id')->nullable();
            $table->string('code')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('expire_verified_at')->nullable();

            $table->tinyInteger('status')->default(1);
            $table->foreign('image_id')->references('id')->on('galleries');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
