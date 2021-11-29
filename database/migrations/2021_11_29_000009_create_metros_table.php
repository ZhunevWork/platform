<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetrosTable extends Migration
{
    public function up()
    {
        Schema::create('metros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('station')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
