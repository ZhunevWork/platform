<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastructuresTable extends Migration
{
    public function up()
    {
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->string('address')->nullable();
            $table->string('distance')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
