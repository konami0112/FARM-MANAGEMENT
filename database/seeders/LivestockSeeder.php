<?php

namespace Database\Seeders;

use App\Models\Livestock;
use App\Models\Farm;
use Illuminate\Database\Seeder;

class LivestockSeeder extends Seeder
{
    public function run()
    {
        $goldenAcres = Farm::where('name', 'Golden Acres Livestock')->first();

        if (!$goldenAcres) {
            return; // prevent failure if the farm is missing
        }

        $livestocks = [
            [
                'type' => 'Cattle',
                'breed' => 'White Fulani',
                'farm_id' => $goldenAcres->id,
                'quantity' => 120,
                'acquisition_date' => '2025-01-15',
                'purpose' => 'Dairy',
                'health_status' => 'Good',
                'notes' => 'Vaccinated against CBPP'
            ],
            [
                'type' => 'Poultry',
                'breed' => 'Broilers',
                'farm_id' => $goldenAcres->id,
                'quantity' => 5000,
                'acquisition_date' => '2025-06-01',
                'purpose' => 'Meat',
                'health_status' => 'Good',
                'notes' => '6-week old chicks'
            ],
            [
                'type' => 'Goats',
                'breed' => 'Red Sokoto',
                'farm_id' => $goldenAcres->id,
                'quantity' => 85,
                'acquisition_date' => '2024-11-20',
                'purpose' => 'Meat',
                'health_status' => 'Good',
                'notes' => 'Grazing in section B'
            ],
            [
                'type' => 'Sheep',
                'breed' => 'Balami',
                'farm_id' => $goldenAcres->id,
                'quantity' => 60,
                'acquisition_date' => '2025-03-10',
                'purpose' => 'Meat',
                'health_status' => 'Good',
                'notes' => 'Recently dewormed'
            ],
        ];

        foreach ($livestocks as $livestock) {
            Livestock::create($livestock);
        }
    }
}
