<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
        @if ($editMode)
            {{__('Edytuj pozycję legendy')}}
        @else
            {{__('Dodaj nową pozycję legendy')}}
        @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label form="shortcut">{{ __('Skrót')}} </label>
            </div>

            <div class="">
                <x-input placeholder="{{ __('Wprowadź skrót')}}" wire:model="legend.shortcut" />
            </div>
        </div>
        <hr class="my-2">

        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label form="shortcut">{{ __('Nazwa konkurencji')}} </label>
            </div>

            <div class="">
                <x-input placeholder="{{ __('Wprowadź nazwe')}}" wire:model="legend.name" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('tournaments.index') }}" secondary class="mr-2" label=" {{ __('Cofnij') }}" />
            <x-button type="submit" primary label="{{ __('Zapisz') }}"/>
        </div>
    </form>

</div>