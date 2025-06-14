<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitEntry extends Model
{
    public function habit()
    {
        return $this->belongsTo(Habit::class);
    }
}
