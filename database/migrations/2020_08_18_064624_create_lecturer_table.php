<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nip', 25);
            $table->string('name', 50);
            $table->string('email')->nullable();
            $table->timestamps();
            $table->primary('id');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('lecturer');
    }
}
