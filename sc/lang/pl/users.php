<?php
return[
    'attributes' => [
        'name' => 'Nazwisko i imię',
        'email' => 'Adres email',
        'role' => 'Role',
        'created_at' => 'Utworzono',
        'profile' => 'Mój profil',
        'clubName' => 'Klub',
    ],
    'action' => [
        'assign_admin_role' => 'Ustaw role administratora',
        'remove_admin_role' => 'Odbierz role administratora',
        'assign_judge_role' => 'Ustaw role sędziego',
        'remove_judge_role' => 'Odbierz role sędziego',
        
    ],
    'messages' => [
        'successes' => [
        'admin_role_assigned' => 'Ustawiono role administratora dla :user',
        'admin_role_removed' => 'Odebrano role administratora :user',
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