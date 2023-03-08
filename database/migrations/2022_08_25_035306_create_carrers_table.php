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
        Schema::create('carrers', function (Blueprint $table) {
            $table->id();
            $table->string('companyName');
            $table->string('title');
            $table->string('address');
            $table->string('city');
            $table->string('salery')->nullable();
            $table->unsignedBigInteger('sup_id');
            $table->foreign('sup_id')->references('id')->on('supervisors')->onDelete('restrict')->onUpdate('cascade');
            // $table->unsignedBigInteger('stud_id');
            // $table->foreign('stud_id')->references('id')->on('students')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('carrers');
    }
};
