<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillRequestTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_request_teacher', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_request_id')->constrained('skill_requests');
            $table->foreignId('skill_id')->constrained('skills');
            $table->foreignId('teacher_id')->constrained('teachers');
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
        Schema::dropIfExists('skill_request_teacher');
    }
}
