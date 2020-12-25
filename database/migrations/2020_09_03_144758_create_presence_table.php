<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresenceTable extends Migration
{
    
    public function up()
    {
        Schema::create('presence', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->string('class_id', 10);
            $table->integer('examtype_id');
            $table->integer('status');
            $table->string('code', 100);
            $table->foreign(['class_id', 'student_id'])->references(['class_id', 'student_id'])->on('krs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(['class_id', 'examtype_id'])->references(['class_id', 'examtype_id'])->on('examschedule')->onDelete('cascade')->onUpdate('cascade');
            $table->primary(['student_id', 'class_id', 'examtype_id']);
            $table->unique('code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('presence');
    }
}
