<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string('email')->unique();
            $table->string('phone_code');
            $table->string('phone');
            $table->string('password');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->tinyInteger('is_super')->default(0);

            $table->string('code')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('expire_verified_at')->nullable();
            
            $table->tinyInteger('status')->default(1);

            $table->foreign('image_id')->references('id')->on('galleries');
            $table->foreign('role_id')->references('id')->on('roles')->nullOnDelete();

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
        Schema::dropIfExists('admins');
    }
}
