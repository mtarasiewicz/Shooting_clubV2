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
                    <x-button primary label="{{ __('Dodaj Zawody')}}" 
                    href="{{ route('tournaments.create')}}" class="justify-self-end"  />
                </div>
                
                <h2 style="margin-top:50px; margin-left:12px;">Legenda</h2>
                <livewire:legenditems.legenditems-table-view />
                <div class="grid justify-items-stretch pt-2 pr-2">
                    <x-button primary label="{{ __('Dodaj Pozycję Legendy')}}" 
                    href="{{ route('legend_items.create')}}" class="justify-self-end"  />
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>