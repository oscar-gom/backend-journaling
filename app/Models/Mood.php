<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    protected $fillable = [
        'journal_id',
        'mood',
        'description',

    ];
}
