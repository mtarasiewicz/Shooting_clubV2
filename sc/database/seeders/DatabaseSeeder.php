<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Competition;
use App\Models\User;
use App\Models\Tournament;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        
        \App\Models\User::factory(10)->create()->each(function ($user) {
            $user->assignRole(Role::findByName(config('auth.roles.member')));
        });

        $this->call(CompetitionSeeder::class);
        $this->call(TournamentSeeder::class);
        $this->call(LegendSeeder::class);

        $competitions = Competition::all();

        // randomly attach competitions to tournaments
        Tournament::all()->each(function ($tournament) use ($competitions) {
            $tournament->competitions()->attach(
                $competitions->random(rand(1, 4))->pluck('id')->toArray()
            );
        });

        // filter out admin, judge and member
        $users = User::all()->filter(function($item)
            {
                if($item->id > 3)
                {
                    return $item;
                }
            });

        // randomly attach filtered users to tournaments
        Tournament::all()->each(function ($tournament) use ($users) {
            $tournament->participants()->attach(
                $users->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
