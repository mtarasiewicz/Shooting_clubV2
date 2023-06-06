<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
        Dodawanie konkurencji
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('tournaments.attributes.competition') }}</label>
            </div>
            <div class="">
            <select wire:model.defer="competitionId" id="form" class="tf-input">
                <option value="null" disabled>{{ __('Wybierz konkurencję') }}</option>
                @foreach ($competitions as $competition)
                <option value="{{ $competition->id }}">{{ $competition->name }}</option>
                @endforeach
            </select>
            </div>
        </div>
        <hr class="my-2">
        <div class="flex jusitfy-end pt-2">
            <x-button href="{{ route('tournamentCompetitions', ['tournament' => $this->tournament]) }}" secondary class="mr-2" label="{{ __('translation.back') }}"/>
            <x-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>