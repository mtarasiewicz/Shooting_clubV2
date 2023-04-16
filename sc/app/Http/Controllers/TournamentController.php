<?php

namespace App\Http\Controllers;

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
        return view(
            'tournaments.form'
        );
    }

    public function edit(Tournament $tournament)
    {
        return view(
            'tournaments.form',
            [
                'tournament' => $tournament
            ]);
    }

    public function participants(Tournament $tournament)
    {
        return view('tournaments.participants', [
            'tournament' => $tournament
        ]);
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
