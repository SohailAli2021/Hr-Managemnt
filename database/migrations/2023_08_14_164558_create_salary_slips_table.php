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
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('bonus', 10, 2);
            $table->decimal('allowance', 10, 2);
            $table->decimal('conveyance', 10, 2);
            $table->decimal('total_salary', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('fund', 10, 2);
            $table->decimal('overtime_earnings', 10, 2);
            $table->decimal('net_salary', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_slips');
    }
};
