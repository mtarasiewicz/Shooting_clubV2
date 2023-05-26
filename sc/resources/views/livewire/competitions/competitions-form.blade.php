<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
        @if ($editMode)
            {{__('Edytuj konkurencji')}}
        @else
            {{__('Dodaj nową konkurencję')}}
        @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label form="name">{{ __('Nazwa konkurencji')}} </label>
            </div>

            <div class="">
                <x-input placeholder="{{ __('Wprowadź nazwe')}}" wire:model="competition.name" />
            </div>
        </div>
        <hr class="my-2">

        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label form="description">{{ __('Opis konkurencji')}} </label>
            </div>

            <div class="">
                <x-input placeholder="{{ __('Wprowadź opis')}}" wire:model="competition.description" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('competitions.index') }}" secondary class="mr-2" label=" {{ __('Cofnij') }}" />
            <x-button type="submit" primary label="{{ __('Zapisz') }}"/>
        </div>
    </form>

</div>