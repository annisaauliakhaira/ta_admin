<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building', function (Blueprint $table) {
            $table->string('id',5);
            $table->string('name', 50);
            $table->primary('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('building');
    }
}
