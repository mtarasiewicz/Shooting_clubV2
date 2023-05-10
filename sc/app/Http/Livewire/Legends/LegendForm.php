<?php

namespace App\Http\Livewire\Legends;

use App\Models\Legend;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class LegendForm extends Component
{
    use Actions;

    public Legend $legend;
    public Bool $editMode;

    public function rules()
    {
        return[
            'legend.name' => [
                'required',
                'string',
                'min:2',
                'unique:legends,name' . 
                    ($this->editMode ? (',' . $this->legend->id) : '')
            ],

            'legend.shortcut' => [
                'required',
                'string',
                'min:1',
                'unique:legends,shortcut' . 
                    ($this->editMode ? (',' . $this->legend->id) : '')
            ],

            
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('legend.attributes.name')),
            'shortcut' => Str::lower(__('legend.attributes.shortcut'))
        ];
    }

    public function mount(Legend $legend, Bool $editMode)
    {
        $this->legend = $legend;
        $this->editMode = $editMode;
    }

    public function render(){
        return view('livewire.legends.legends-form');
    }

    public function updated($propretyName)
    {
        $this->validateOnly($propretyName);
    }

    public function save(){

        sleep(1);
        $this->validate();
        $this->legend->save();
        $this->notification()->success(
            $title = $this->editMode
            ? __('translation.messages.successes.updated_title')
            : __('translation.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('translation.messages.successes.updated',['name' => $this->legend->name])
                : __('translation.messages.successes.stored',['name' => $this->legend->name])
                
        );
        $this->editMode = true;

    }

}
