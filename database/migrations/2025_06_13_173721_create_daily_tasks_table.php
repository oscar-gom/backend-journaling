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
        Schema::create('daily_tasks', function (Blueprint $table) {
            $table->id('daily_task_id');
            $table->foreignId('journal_id')->constrained('journals')->onDelete('cascade');
            $table->string('task_1')->nullable();
            $table->string('task_2')->nullable();
            $table->string('task_3')->nullable();
            $table->boolean('task_1_done')->default(false);
            $table->boolean('task_2_done')->default(false);
            $table->boolean('task_3_done')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_tasks');
    }
};
