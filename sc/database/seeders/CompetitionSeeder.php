<?php

namespace Database\Seeders;

use App\Models\Competition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $csvFile = fopen(base_path("resources/csv/competition.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 200, ';')) !== FALSE) {
            if (!$firstLine) {
                Competition::create(
                    [
                        'name' => $data[0],
                        'shortcut' => $data[1],
                        'description' => $data[2]
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
