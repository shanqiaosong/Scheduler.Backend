<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_infos', function (Blueprint $table) {
            $table->timestamps();
            $table->string('uid')->primary();
            $table->string('course_name');
            $table->string('description')->nullable();
            $table->string('exam_info')->nullable();
            $table->string('teachers');
            //$table->string('class_time');
            $table->string('semester');
            $table->timestamp('update_timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_infos');
    }
}
