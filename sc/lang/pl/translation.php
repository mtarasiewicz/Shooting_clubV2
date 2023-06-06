<?php

return [
    'attributes' => [
        'created_at' => 'Utworzono',
        'updated_at' => 'Zaktualizowano',
        'deleted_at' => 'Usunięto',
    ],
    'messages' => [
        'successes' => [
            'stored_title' => 'Utworzono',
            'updated_title' => 'Zaktualizowano',
            'destroy_title' => 'Usunięto',
            'restore_title' => 'Przywrócono',
            'destroy_description' => 'Usuwanie powiodło się',
            'restore_description' => 'Przywracanie powiodło się',
            'updated' => 'Zmiany zostały zapisane',
            'stored' => 'Pomyślnie utworzono nową pozycję'
        ]
    ],
    'dialogs' => [
        'soft_delete' => [
            'title' => 'Usuwanie',
            'description' => 'Czy na pewno usunąć?',
        ],
        'restore' => [
            'title' => 'Przywracanie',
            'description' => 'Czy na pewno przywrócić?',
        ],
    ],
    'actions' => [
        'edit' => 'Edytuj',
        'destroy' => 'Usuń',
        'restore' => 'Przywróć',
        'participants' => 'Zawodnicy',
        'competitions' => 'Konkurencje'
    ],
    'logout' => "Wyloguj się",
    'yes' => 'Tak',
    'no' => 'Nie',
    'cancel' => 'Anuluj',
    'store' => 'Utwórz',
    'update' => 'Aktualizuj',
    'save' => 'Zapisz',
    'back' => 'Wstecz',
    'enter' => 'Wprowadź wartość',
    'select' => 'Wybierz wartość',
    'acc' => 'Twoje konto: ',
    'account' => [
        'manage_account' => 'Zarządzanie profilem',
        'profile' => 'Profil',
        'name' => 'Nazwisko i imię',
        'password' => 'Hasło',
        'password_confirm' => 'Powtórz hasło',
        'password_reset' => 'Resetuj hasło',
        'email' => 'Email',
        'remember_me' => 'Zapamiętaj mnie',
        'already_registered' => 'Już zarejestrowany?',
        'confirm' => 'Potwierdź',
        'confirm_password_info' => 'Dostęp do tej funkcjonalności wymaga potwierdzenia hasła',
        'forgot_password' => 'Zapomniałeś hasła?',
        'forgot_password_info' => 'Zapomniałeś hasła? Podaj adres email, a',
        'send' => 'Wyślij',
        'logout' => 'Wyloguj się',
        'login' => 'Zaloguj się',
        'register' => 'Zarejestruj',
        'api_tokens' => [
            'manage' => 'Zarządzaj tokenami API',
            'create_new' => 'Stwórz nowy API token',
            'description' => 'API tokens allow third-party services to aut',
            'toke_name' => 'Nazwa tokenu',
            'permissions' => 'Uprawnienia'
        ],
        'team' => [
            'manage' => 'Zarządzanie zespołem',
            'settings' => 'Ustawienia zespołu',
            'create_new' => 'Stwórz nowy zespół',
            'switch' => 'Zmień zespół',
        ]
    ],
    'navigation' => [
        'dashboard' => 'Dashboard',
        'log-viewer' => 'Logi',
        'users' => 'Użytkownicy',
        'tournaments' => 'Zawody',
        'legends' => 'Legenda',
        'participants' => 'Zawodnicy',
        'competitions' => 'Konkurencje',
    ],
    'add' => 'Dodaj',
];