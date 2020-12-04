<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
//            $table->id();
            $table->timestamps();
            $table->string('student_id')->primary();
            $table->string('credential');
            $table->string('school_abbr');
            $table->boolean('allow_email_notification')->nullable();
            $table->boolean('allow_push_notification')->nullable();
            $table->timestamp('last_deadline_modification_time')->nullable();
            $table->timestamp('last_course_modification_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
