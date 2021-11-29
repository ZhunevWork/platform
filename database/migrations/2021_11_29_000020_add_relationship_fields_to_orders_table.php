<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('apartament_id')->nullable();
            $table->foreign('apartament_id', 'apartament_fk_5449676')->references('id')->on('apartments');
        });
    }
}
