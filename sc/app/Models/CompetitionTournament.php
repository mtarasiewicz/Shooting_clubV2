<?php

namespace App\Models;

use App\Models\Tournament;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CompetitionTournament extends Pivot
{
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
