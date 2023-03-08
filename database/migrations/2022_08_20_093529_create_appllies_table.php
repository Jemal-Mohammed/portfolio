<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appllies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sup_id');
            $table->foreign('sup_id')->references('id')->on('supervisors')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('stud_id');
            $table->foreign('stud_id')->references('id')->on('students')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('position_id');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict')->onUpdate('cascade');
            $table->string('status')->default('unassigned');
            $table->string('feedback')->default('no');
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
        Schema::dropIfExists('appllies');
    }
};
