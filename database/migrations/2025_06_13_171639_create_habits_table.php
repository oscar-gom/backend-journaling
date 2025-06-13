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
        Schema::create('habits', function (Blueprint $table) {
            $table->id('habit_id');
            $table->foreignId('journal_id')->constrained('journals')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('frequency_unit', ['daily', 'weekly', 'monthly', 'weekdays', 'weekends']);
            $table->integer('frequency_value')->default(1);
            $table->date('last_occurrence_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habits');
    }
};
