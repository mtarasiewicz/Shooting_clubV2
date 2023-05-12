<?php

namespace App\Models;

use App\Models\User;
use App\Models\Competition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;
    use SoftDeletes;

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
}
