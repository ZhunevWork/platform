<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplexInfrastructurePivotTable extends Migration
{
    public function up()
    {
        Schema::create('complex_infrastructure', function (Blueprint $table) {
            $table->unsignedBigInteger('complex_id');
            $table->foreign('complex_id', 'complex_id_fk_5449626')->references('id')->on('complexes')->onDelete('cascade');
            $table->unsignedBigInteger('infrastructure_id');
            $table->foreign('infrastructure_id', 'infrastructure_id_fk_5449626')->references('id')->on('infrastructures')->onDelete('cascade');
        });
    }
}
