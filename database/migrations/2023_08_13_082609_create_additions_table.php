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
        Schema::create('additions', function (Blueprint $table) {
            $table->id();
        $table->decimal('basic_salary', 10, 2)->default(0);
        $table->decimal('bonus', 10, 2)->default(0);
        $table->decimal('allowance', 10, 2)->default(0);
        $table->decimal('conveyance', 10, 2)->default(0);
        $table->unsignedBigInteger('employee_id');
        $table->foreign('employee_id')->references('id')->on('employees');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additions');
    }
};
