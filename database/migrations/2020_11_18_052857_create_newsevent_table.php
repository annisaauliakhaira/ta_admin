<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewseventTable extends Migration
{
    
    public function up()
    {
        Schema::create('newsevent', function (Blueprint $table) {
            $table->string('id', 5);
            $table->text('news_event');
            $table->string('exam_id', 10);
            $table->foreign('exam_id')->references('id')->on('examschedule')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('newsevent');
    }
}
