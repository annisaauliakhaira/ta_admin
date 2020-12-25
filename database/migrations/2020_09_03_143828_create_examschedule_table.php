<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamscheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examschedule', function (Blueprint $table) {
            $table->string('id', 10);
            $table->time('start_hour');
            $table->time('ending_hour');
            $table->date('date');
            $table->integer('status');
            $table->string('room_id', 5);
            $table->string('class_id', 10);
            $table->integer('staff_id')->unsigned();
            $table->integer('examtype_id');
            $table->foreign('room_id')->references('id')->on('room')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('examtype_id')->references('id')->on('examtype')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('id');
            $table->unique(['class_id', 'examtype_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('examschedule');
    }
}
