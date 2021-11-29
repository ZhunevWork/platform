<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->boolean('in_stock')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->longText('short_description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_usd')->nullable();
            $table->integer('price_eur')->nullable();
            $table->integer('floor')->nullable();
            $table->integer('all_floor')->nullable();
            $table->integer('area')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->string('options')->nullable();
            $table->string('address')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
