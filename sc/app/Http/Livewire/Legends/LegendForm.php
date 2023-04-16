<?php

namespace App\Http\Livewire\Legends;

use Livewire\Component;
use App\Models\LegendItem;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class LegendForm extends Component
{
    use Actions;

    public LegendItem $legend_item;
    public Bool $editMode;

    public function rules()
    {
        return[
            'legend_item.name' => [
                'required',
                'string',
                'min:2',
                'unique:legend_items,name' . 
                    ($this->editMode ? (',' . $this->legend_item->id) : '')
            ],

            'legend_item.shortcut' => [
                'required',
                'string',
                'min:2',
                'unique:legend_items,shortcut' . 
                    ($this->editMode ? (',' . $this->legend_item->id) : '')
            ],

            
        ];
    }

    public function validationAttributes()
    {
        return [
            'name' => Str::lower(__('legend_item.attributes.name'))
        ];
    }

    public function mount(LegendItem $legend_item, Bool $editMode)
    {
        $this->legend_item = $legend_item;
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
        $this->legend_item->save();
        $this->notification()->success(
            $title = $this->editMode
                ? __('Zapisano zmiany')
                : __(' '),
            $description = $this->editMode
                ? __(' ',['name' => $this->legend_item->name])
                : __(' ',['name' => $this->legend_item->name])
        );
        $this->editMode = true;

    }

}
