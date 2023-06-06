<?php

namespace App\Models;

use App\Models\User;
use App\Models\Competition;
use App\Models\CompetitionTournament;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;
    use SoftDeletes;
    const TEST = 'brak';
    protected $fillable = [
        'name',
        'date',
        'venue',
        'competitions',
        'description'
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class);
    }

    public function competitionTournament()
    {
        return $this->belongsTo(CompetitionTournament::class);
    }

    public function pdfUrl() : string
    {
        return $this-> pdfExists() 
        ? Storage::url($this->rules)
        : Storage::url(self::TEST);
    }

    protected function pdf() : Attribute
    {
        return Attribute::make(
            get: function ($value){
                if ($value === null)
                {
                    return null;
                }
                return config('filesystems.pdf_dir') . '/' . $value;
            },
        );
    }
    public function pdfExists() : bool
    {
        return $this->rules !== null
        && Storage::disk('public')->exists($this->rules);
    }
}
