<?php

return [
    'attributes' => [
        'name' => 'Nazwa',
        'shortcut' => 'Skrót',
        'created_at' => 'Data utworzenia',
        'updated_at' => 'Data edycji',
        'deleted_at' => 'Data usuniecia',
    ],
    'dialogs' =>[
        'soft_delete_title' => 'Czy chcesz usunac?',
        'soft_delete_description' => 'Pozycja zostanie usunieta czy chcesz kontynuować?',
        'restore_title' => 'Przywróć?',
        'restore_description' => 'Czy chcesz przywrócić pozycję?',
        'successes' => [
            'destroy_title' => 'Usunięto',
            'destroy_description' => 'Usuwanie pozycji powiodło się',
            'restore_title' => 'Przywrócono',
            'restore_description' => 'Przywracanie pozycji powiodło się',
        ],
    ],
];