<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexMetroPivotTable extends Migration
{
    public function up()
    {
        Schema::create('complex_metro', function (Blueprint $table) {
            $table->unsignedBigInteger('complex_id');
            $table->foreign('complex_id', 'complex_id_fk_5449625')->references('id')->on('complexes')->onDelete('cascade');
            $table->unsignedBigInteger('metro_id');
            $table->foreign('metro_id', 'metro_id_fk_5449625')->references('id')->on('metros')->onDelete('cascade');
        });
    }
}
