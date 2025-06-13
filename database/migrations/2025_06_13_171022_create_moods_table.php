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
        Schema::create('moods', function (Blueprint $table) {
            $table->id('mood_id');
            $table->enum('mood', ['happy', 'neutral', 'sad', 'angry', 'anxious', 'excited', 'calm', 'tired', 'stressed', 'grateful']);
            $table->text('description')->nullable();
            $table->foreignId('journal_id')->constrained('journals', 'journal_id')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moods');
    }
};
