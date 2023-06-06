<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $tournament->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tournaments.competitions-table-view :tournament="$tournament"/>
                <x-button style="margin-bottom:7px; margin-left:7px; margin-top:-7px" href="{{ route('tournaments.index') }}" secondary label="{{ __('translation.back') }}"/>
                <x-button style="margin-bottom:7px; margin-left:7px; margin-top:-7px" href="{{ route('addTournamentCompetition', ['tournament' => $tournament]) }}" primary label="{{ __('translation.add') }}"/>
            </div>
        </div>
    </div>
</x-app-layout>