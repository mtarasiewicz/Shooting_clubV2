<?php
return[
    'attributes' => [
        'name' => 'Nazwisko i imię',
        'email' => 'Adres email',
        'role' => 'Role',
        'created_at' => 'Utworzono',
        'profile' => 'Mój profil',
        'clubName' => 'Klub',
        'verified?' => 'Weryfikacja',
    ],
    'action' => [
        'assign_admin_role' => 'Ustaw role administratora',
        'remove_admin_role' => 'Odbierz role administratora',
        'assign_judge_role' => 'Ustaw role sędziego',
        'remove_judge_role' => 'Odbierz role sędziego',
        'verify_user' => 'Zweryfikuj użytkownika',
        
    ],
    'messages' => [
        'successes' => [
        'admin_role_assigned' => 'Ustawiono role administratora',
        'admin_role_removed' => 'Odebrano role administratora',
        'judge_role_assigned' => 'Ustawiono role sędziego',
        'judge_role_removed' => 'Odebrano role sędziego',
        'verify' => 'Zweryfikowano użytkownika'
        ],
        'errors' => [
            'error' => 'Niepowodzenie!',
            'admin_warning' => 'Nie mozna usunąć roli administratora samemu sobie!',
         ],
    ],
    'update_information' => [
        'title' => 'Informacje',
        'desc' => 'Zaaktualizuj swój profil klubowy'

    ],


];