<?php

namespace Database\Seeders;

use App\Models\Legend;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LegendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("resources/csv/legend_item.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                Legend::create(
                    [
                        'shortcut' => $data['0'],
                        'name' => $data['1']
                    ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
