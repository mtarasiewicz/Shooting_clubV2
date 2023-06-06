<?php

namespace App\Http\Livewire\Tournaments;

use App\Models\Competition;
use Livewire\Component;
use App\Models\Tournament;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CompetitionForm extends Component
{
    use Actions;

    public Tournament $tournament;
    public $competitions;
    public $competitionId;
    public $competition;
    
    public function rules()
    {
        return [
            'competition' => [
                'required'
            ],
        ];
    }

    public function validationAttributes()
    {
        return [

        ];
    }

    public function mount(Tournament $tournament)
    {
        $this->tournament = $tournament;
        $tournament_id = $this->tournament->id;
        $this->competitions = Competition::whereDoesntHave('tournaments', function($q) use ($tournament_id) {
            $q->where('tournament_id', $tournament_id);
        })->get();
    }

    public function render()
    {
        return view('livewire.tournaments.tournament-competition-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->competition = Competition::find($this->competitionId);
    }

    public function save()
    {
        // dd($this->competitionId);
        $this->validate();
        DB::insert('INSERT into competition_tournament (tournament_id, competition_id) values (?, ?)', [$this->tournament->id, $this->competition->id]);
        // $this->notification()->success(
        //     __('tournaments.messages.successes.stored',['name' => $this->competition->name])
        // );
        return redirect()->route('tournamentCompetitions', ['tournament' => $this->tournament]);
    }
}
