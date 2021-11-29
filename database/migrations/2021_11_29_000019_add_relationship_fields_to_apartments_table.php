<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApartmentsTable extends Migration
{
    public function up()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->unsignedBigInteger('complex_id')->nullable();
            $table->foreign('complex_id', 'complex_fk_5449649')->references('id')->on('complexes');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_5449650')->references('id')->on('types');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_5449651')->references('id')->on('statuses');
        });
    }
}
