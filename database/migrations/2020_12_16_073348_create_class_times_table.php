<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_times', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->int('classID');
            $table->int('nthClassStart');
            $table->int('nthClassEnd');
            $table->int('dayOfWeek');
            //$table->ClassWeekType('weekType')->nullable();
            $table->int('startWeekIndex')->nullable();
            $table->int('endWeekIndex')->nullable();
            $table->string('classroom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_times');
    }
}
