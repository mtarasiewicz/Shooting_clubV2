<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.tournaments') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:tournaments.tournaments-table-view />
                <div class="grid justify-items-stretch pt-2 pr-2">
                @can('create', App\Models\Tournament::class)
                    <x-button primary label="{{ __('Dodaj Zawody')}}" 
                    href="{{ route('tournaments.create')}}" class="justify-self-end"  />
                @endcan
                </div>
                
                <h2 style="margin-top:50px; margin-left:12px;">Legenda</h2>
                <livewire:legends.legends-table-view />
                <div class="grid justify-items-stretch pt-2 pr-2">
                @can('create', App\Models\Legend::class)
                    <x-button primary label="{{ __('Dodaj Pozycję Legendy')}}" 
                    href="{{ route('legends.create')}}" class="justify-self-end"  />
                @endcan
                <div class="grid justify-items-stretch pt-2 pr-2">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>