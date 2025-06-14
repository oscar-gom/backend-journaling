<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    public function habit_entries()
    {
        return $this->hasMany(HabitEntry::class);
    }

    protected $fillable = [
        'name',
        'journal_id',
        'description',
        'frequency_unit',
        'frequency_value',
        'last_occurrence_at',
    ];
}
