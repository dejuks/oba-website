<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table): void {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('full_name');
            $table->enum('gender', ['male', 'female']);
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email')->nullable();
            $table->date('hire_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
