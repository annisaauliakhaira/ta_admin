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
            $table->string('id', 15);
            $table->string('krs_id', 10);
            $table->string('schedule_id', 10);
            $table->integer('status');
            $table->string('code', 100);
            $table->foreign('krs_id')->references('id')->on('krs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('schedule_id')->references('id')->on('examschedule')->onDelete('cascade')->onUpdate('cascade');
            $table->primary('id');
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
