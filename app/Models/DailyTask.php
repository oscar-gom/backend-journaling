<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyTask extends Model
{
    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }
}
