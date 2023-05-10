<?php

namespace App\Http\Livewire\Tournaments;

use Livewire\Component;
use App\Models\Tournament;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class TournamentForm extends Component
{
    use Actions;

    public Tournament $tournament;
    public bool $editMode;

    public function rules()
    {
        return [
            'tournament.name'=>[
                'required',
                'string',
                'min:2',
                'unique:tournaments,name'.
                    ($this->editMode ? (',' . $this->tournament->id):''),
            ],
            'tournament.date'=>[
                'required',
                'date'
            ],
            'tournament.venue'=>[
                'required',
                'string',
            ],
            'tournament.competitions'=>[
                'required',
                'string',
            ],
            // 'tournament.participants'=>[
            //     'required',
            //     'string',
            // ],
            'tournament.description'=>[
                'required',
                'string',
            ],
        ];
    }
    public function validationAttributes()
    {
        return [
            'name'=> Str::lower(__('tournaments.attributes.name')),
            'date'=> Str::lower(__('tournaments.attributes.date')),
            'venue'=> Str::lower(__('tournaments.attributes.venue')),
            'competitions'=> Str::lower(__('tournaments.attributes.competitions')),
            //'participants'=> Str::lower(__('tournaments.attributes.participants')),
            'description'=> Str::lower(__('tournaments.attributes.description')),
        ];
    }
    public function mount(Tournament $tournament, Bool $editMode)
    {
        $this->tournament = $tournament;
        $this->editMode = $editMode;
    }
    public function render()
    {
        return view('livewire.tournaments.tournament-form');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        $this->tournament->save();
        $this->notification()->success(
            $title=$this->editMode
            ? __('translation.messages.successes.updated_title')
            : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
            ? __('tournaments.messages.successes.updated',['name' => $this->tournament->name])
            : __('tournaments.messages.successes.stored',['name' => $this->tournament->name])
        );
        $this->editMode = true;
    }
}
