<?php

namespace App\Http\Livewire\Tournaments;

use Livewire\Component;
use App\Models\Tournament;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class TournamentForm extends Component
{
    use Actions;
    use WithFileUploads;

    public Tournament $tournament;
    public bool $editMode;
    public $rules;

    public $rulesUrl;
    public $ruleExists;
    

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
            'tournament.description'=>[
                'required',
                'string',
            ],
            'rules' => [
                'nullable',
                'mimes:pdf',
                'max:2048',
            ]
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
            'rules' => Str::lower(__('tournaments.attributes.rules'))
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
        $rules = $this->rules;
        $tournament = $this->tournament;
        $this->tournament->save();
        if ($rules !== null)
        {
            $tournament->rules = $tournament->id . '.' . $this->rules->getClientOriginalExtension();
            $tournament->save();
            $this->rules->storeAs('', $this->tournament->rules, 'public');
        }
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
