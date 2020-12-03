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
            $table->integer('id');
            $table->foreign('id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nik', 20);
            $table->string('nip', 25);
            $table->string('name', 30);
            $table->text('address');
            $table->enum('gender', ['male', 'female']);
            $table->timestamps();
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
        Schema::dropIfExists('lecturer');
    }
}
