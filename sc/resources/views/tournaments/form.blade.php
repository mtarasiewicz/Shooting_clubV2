<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.tournaments') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($tournament))
                    <livewire:tournaments.tournament-form :tournament="$tournament" :editMode="true"/>
                @else
                    <livewire:tournaments.tournament-form :editMode="false"/>
                @endif
            </div>
        </div>
    </div> 
</x-app-layout>