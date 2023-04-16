<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Seeder;

class TournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("resources/csv/tournament.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 200, ';')) !== FALSE) {
            if (!$firstLine) {
                Tournament::create(
                    [
                        'date' => $data[0],
                        'name' => $data[1],
                        'venue' => $data[2],
                        'competitions' => $data[3],
                        'description' => $data[4]
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
