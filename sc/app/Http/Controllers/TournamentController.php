<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\CompetitionTournament;
use App\Models\User;
use App\Models\Tournament;
use Illuminate\Support\Facades\DB;

class TournamentController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Tournament::class);
        return view(
            'tournaments.index'
        );
    }

    public function create()
    {
        $this->authorize('create', Tournament::class);
        return view(
            'tournaments.form'
        );
    }

    public function edit(Tournament $tournament)
    {
        $this->authorize('update', $tournament);
        return view(
            'tournaments.form',
            [
                'tournament' => $tournament
            ]);
    }

    public function competitions(Tournament $tournament)
    {
        return view('tournaments.competitions', [
            'tournament' => $tournament
        ]);
    }

    public function addCompetition(Tournament $tournament) {
        return view('tournaments.competition-form', [
            'tournament' => $tournament
        ]);
    }

    public function participants(Tournament $tournament)
    {
        return view('tournaments.participants', [
            'tournament' => $tournament
        ]);
    }
    public function download(Tournament $tournament)
    {
        $path = public_path('storage/'. $tournament->rules);
        return response()->download($path);
    }

    public function registerParticipant(Tournament $tournament, User $participant) {
        $this->authorize('register', Tournament::class);
        DB::insert('INSERT into tournament_user (tournament_id, user_id) values (?, ?)', [$tournament->id, $participant->id]);
        return view('tournaments.participants', [
            'tournament' => $tournament
        ]);
    }

    public function unregisterParticipant(Tournament $tournament, User $participant) {
        $this->authorize('register', Tournament::class);
        DB::delete("DELETE from tournament_user where tournament_id = '" . $tournament->id . "' and user_id = '" . $participant->id . "' ");
        return view('tournaments.participants', [
            'tournament' => $tournament
        ]);
    }
}
