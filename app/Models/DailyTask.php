<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyTask extends Model
{
    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    protected $fillable = [
        'journal_id',
        'task_1',
        'task_2',
        'task_3',
        'task_1_done',
        'task_2_done',
        'task_3_done',
    ];
}
