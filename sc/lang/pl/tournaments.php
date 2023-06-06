<?php

return [
    'attributes' => [
        'name' => 'Nazwa zawodów',
        'date' => 'Data',
        'venue' => 'Miejsce',
        'competitions' => 'Konkurencje',
        'participants' => 'Uczestnicy',
        'description' => 'Opis',
        'competition' => 'Konkurencja',
    ],
    'labels' => [
        'create_form_title' => 'Tworzenie zawodów',
        'edit_form_title' => 'Edycja zawodów',
    ],
    'dialogs' =>[
        'soft_delete_title' => 'Czy chcesz usunac?',
        'soft_delete_description' => 'Pozycja zostanie usunieta czy chcesz kontynuować?',
        'restore_description' => 'Czy chcesz przywrócić pozycję?',
        'restore_title' => 'Przywróć?',
    ],
    'messages' =>[
        'successes' => [
            'destroy_title' => 'Pomyslnie usunieto',
            'restore' => 'Przywracanie pozycji powiodło się',
            'updated' => 'Zmiany zostały zapisane',
            'stored' => 'Utworzono nową pozycję zawodów'
            
        ],
    ],
    'register' => 'Zapisz się',
    'unregister' => 'Wypisz się',
];