<?php

namespace App\Models;

use App\Models\Tournament;
use App\Models\CompetitionTournament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'shortcut',
        'description'
    ];

    public function tournaments()
    {
        return $this->belongsToMany(Tournament::class);
    }

    public function competitionTournament()
    {
        return $this->belongsTo(CompetitionTournament::class);
    }
}
