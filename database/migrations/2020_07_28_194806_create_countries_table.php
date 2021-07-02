<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('iso3' , 5);
            $table->string('iso2' , 3);
            $table->string('phone_code')->nullable();
            $table->string('timezone')->nullable();
            $table->foreignId('currency_id')->constrained('currencies');
            $table->foreignId('flag_id')->nullable()->constrained('galleries');
            $table->decimal('latitude',10,6);
            $table->decimal('longitude',10,6);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('countries');
    }
}
