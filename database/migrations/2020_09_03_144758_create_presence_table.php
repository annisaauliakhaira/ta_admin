<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presence', function (Blueprint $table) {
            $table->string('class_id', 10);
            $table->integer('student_id');
            $table->string('schedule_id', 10);
            $table->integer('status');
            $table->string('code', 100);
            $table->foreign(['class_id', 'student_id'])->references(['class_id', 'student_id'])->on('krs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('schedule_id')->references('id')->on('examschedule')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['class_id', 'student_id', 'schedule_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presence');
    }
}
