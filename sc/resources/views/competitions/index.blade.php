<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.competitions') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:competitions.competitions-table-view />
                <div class="grid justify-items-stretch pt-2 pr-2">
                @can('create', App\Models\Competition::class)
                    <x-button primary label="{{ __('Dodaj Konkurencje')}}" 
                    href="{{ route('competitions.create')}}" class="justify-self-end"  />
                @endcan
                <div class="grid justify-items-stretch pt-2 pr-2">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>