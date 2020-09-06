<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->string('id', 10);
            $table->string('name', 25);
            $table->string('courses_id', 10);
            $table->string('period_id', 10);
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('period_id')->references('id')->on('period')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
