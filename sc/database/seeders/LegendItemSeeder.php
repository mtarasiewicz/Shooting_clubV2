<?php

namespace Database\Seeders;

use App\Models\LegendItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LegendItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("resources/csv/legend_item.csv"), 'r');

        $firstLine = true;
        while(($data = fgetcsv($csvFile, 100, ';')) !== FALSE) {
            if (!$firstLine) {
                LegendItem::create(
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
