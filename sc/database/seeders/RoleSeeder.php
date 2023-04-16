<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $admin = Role::create(['name' => config('auth.roles.admin')]);
        $judge = Role::create(['name' => config('auth.roles.judge')]);
        $member = Role::create(['name' => config('auth.roles.member')]);
    }
}
