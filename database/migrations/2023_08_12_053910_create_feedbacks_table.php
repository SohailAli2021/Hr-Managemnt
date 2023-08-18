<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->unsignedBigInteger('attendance_id');
            $table->foreign('attendance_id')->references('id')->on('attendances');
            $table->enum('project_rating', ['good', 'poor', 'excellent']);
            $table->enum('attendance_rating', ['good', 'poor', 'excellent']);
            $table->enum('team_feedback_rating', ['good', 'poor', 'excellent']);
            $table->text('comments')->nullable();
            $table->string('month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
