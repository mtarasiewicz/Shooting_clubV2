<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@localhost',
            'password' => Hash::make('12345678'),
        ]);
        $adminRole = Role::findByName(config('auth.roles.admin'));
        if(isset($adminRole))
        {
            $admin->assignRole($adminRole);
        }
        $judge = User::create([
            'name' => 'Judge',
            'email' => 'judge@localhost',
            'password' => Hash::make('12345678'),
        ]);
        $judgeRole = Role::findByName(config('auth.roles.judge'));
        if(isset($judgeRole))
        {
            $judge->assignRole($judgeRole);
        }
        $member = User::create([
            'name' => 'Club member',
            'email' => 'member@localhost',
            'password' => Hash::make('12345678'),
        ]);
        $memberRole = Role::findByName(config('auth.roles.member'));
        if (isset($memberRole))
        {
            $member->assignRole($memberRole);
        }
    }
}
