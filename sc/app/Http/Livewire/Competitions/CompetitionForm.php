<?php

namespace App\Http\Livewire\Competitions;

use Livewire\Component;
use App\Models\Competition;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class CompetitionForm extends Component
{
use Actions;

public Competition $competition;
public bool $editMode;

public function rules()
{
    return [
        'competition.name'=>[
            'required',
            'string',
            'min:2',
            'unique:competitions,name'.
                ($this->editMode ? (',' . $this->competition->id):''),
        ],
        'competition.shortcut'=>[
            'required',
            'string',
        ],
        'competition.description'=>[
            'required',
            'string',
        ],
    ];
}
public function validationAttributes()
{
    return [
        'name'=> Str::lower(__('competitions.attributes.name')),
        'shortcut'=> Str::lower(__('competitions.attributes.shortcut')),
        'description'=> Str::lower(__('competitions.attributes.description')),
    ];
}
public function mount(Competition $competition, Bool $editMode)
{
    $this->competition = $competition;
    $this->editMode = $editMode;
}
public function render()
{
    return view('livewire.competitions.competitions-form');
}
public function updated($propertyName)
{
    $this->validateOnly($propertyName);
}
public function save()
{
    $this->validate();
    $this->competition->save();
    $this->notification()->success(
        $title=$this->editMode
        ? __('translation.messages.successes.updated_title')
        : __('translation.messages.successes.stored_title'),
        $description = $this->editMode
        ? __('translation.messages.successes.updated',['name' => $this->competition->name])
        : __('translation.messages.successes.stored',['name' => $this->competition->name])
    );
    $this->editMode = true;
}
}

