<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mood()
    {
        return $this->hasOne(Mood::class);
    }

    public function habits()
    {
        return $this->hasMany(Habit::class);
    }

    public function dailyTasks()
    {
        return $this->hasMany(DailyTask::class);
    }
}
