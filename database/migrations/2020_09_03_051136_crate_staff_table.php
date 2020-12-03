<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->integer('id');
            $table->foreign('id')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nik', 20);
            $table->string('nip', 25);
            $table->string('name', 30);
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
        //
    }
}
