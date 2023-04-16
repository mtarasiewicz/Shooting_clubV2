<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $tournament->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tournaments.participants-table-view :tournament="$tournament"/>
                <x-button style="margin-bottom:7px; margin-left:7px; margin-top:-7px" href="{{ route('tournaments.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}"/>
                @if (!DB::table('tournament_user')->where('tournament_id', $tournament->id)->get()->contains('user_id', auth()->user()->id))
                <x-button style="margin-bottom:7px; margin-left:7px; margin-top:-7px" href="{{ route('registerParticipant', ['tournament' => $tournament, 'participant' => auth()->user()]) }}" secondary class="mr-2" label="{{ __('tournaments.register') }}"/>
                @else
                <x-button style="margin-bottom:7px; margin-left:7px; margin-top:-7px" href="{{ route('unregisterParticipant', ['tournament' => $tournament, 'participant' => auth()->user()]) }}" secondary class="mr-2" label="{{ __('tournaments.unregister') }}"/>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>