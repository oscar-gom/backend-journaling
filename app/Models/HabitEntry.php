<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitEntry extends Model
{
    protected $primaryKey = 'habit_entry_id';

    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }

    protected $fillable = [
        'habit_id',
        'done',
        'note'
    ];
}
