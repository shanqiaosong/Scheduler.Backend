<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDdlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ddls', function (Blueprint $table) {
            $table->timestamps();
            $table->string('uid')->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('eventType')->nullable();
            $table->string('courseObjectID')->nullable();
            $table->string('sourceName')->nullable();
            $table->string('dueTime');
            $table->string('isFinished');
            $table->string('isDeleted');
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
        Schema::dropIfExists('ddls');
    }
}
