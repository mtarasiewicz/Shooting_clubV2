<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
        @if ($editMode)
            {{ __('tournaments.labels.edit_form_title') }}
        @else
            {{ __('tournaments.labels.create_form_title') }}
        @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('tournaments.attributes.name') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translation.enter') }}" wire:model="tournament.name"/>
            </div>
        </div>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="date">{{ __('tournaments.attributes.date') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translation.enter') }}" wire:model="tournament.date"/>
            </div>
        </div>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="venue">{{ __('tournaments.attributes.venue') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translation.enter') }}" wire:model="tournament.venue"/>
            </div>
        </div>
        <!-- <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="competitions">{{ __('tournaments.attributes.competitions') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translation.enter') }}" wire:model="tournament.competitions"/>
            </div>
        </div> -->
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="description">{{ __('tournaments.attributes.participants') }}</label>
            </div>
            <div class="">
                <x-input placeholder="{{ __('translation.enter') }}" wire:model="tournament.description"/>
            </div>
        </div>
        <x-input type="file" wire:model="rules" /> 
        <hr class="my-2">
        <div class="flex jusitfy-end pt-2">
            <x-button href="{{ route('tournaments.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}"/>
            <x-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>