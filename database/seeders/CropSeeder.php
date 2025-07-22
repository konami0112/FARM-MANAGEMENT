<?php

namespace Database\Seeders;

use App\Models\Crop;
use App\Models\Farm;
use Illuminate\Database\Seeder;

class CropSeeder extends Seeder
{
    public function run()
    {
        $greenValleyFarm = Farm::where('name', 'Green Valley Farm')->first();
        $sunrisePlantation = Farm::where('name', 'Sunrise Plantation')->first();

        $crops = [
            [
                'name' => 'Maize',
                'variety' => 'DMR-ES-Y',
                'farm_id' => $greenValleyFarm?->id,
                'planting_date' => '2025-06-15',
                'harvest_date' => '2025-09-20',
                'planted_area' => 45.00,
                'expected_yield' => 180.00,
                'status' => 'growing',
                'notes' => 'Planted after first rains, using improved seeds'
            ],
            [
                'name' => 'Rice',
                'variety' => 'FARO-44',
                'farm_id' => $greenValleyFarm?->id,
                'planting_date' => '2025-07-01',
                'harvest_date' => '2025-10-15',
                'planted_area' => 30.00,
                'expected_yield' => 120.00,
                'status' => 'growing',
                'notes' => 'Planted in lowland area with irrigation'
            ],
            [
                'name' => 'Soybean',
                'variety' => 'TGX-1448',
                'farm_id' => $sunrisePlantation?->id,
                'planting_date' => '2025-06-20',
                'harvest_date' => '2025-09-30',
                'planted_area' => 60.00,
                'expected_yield' => 90.00,
                'status' => 'growing',
                'notes' => 'Intercropped with maize'
            ],
            [
                'name' => 'Cassava',
                'variety' => 'TME-419',
                'farm_id' => $sunrisePlantation?->id,
                'planting_date' => '2025-05-10',
                'harvest_date' => '2026-05-10',
                'planted_area' => 40.00,
                'expected_yield' => 200.00,
                'status' => 'growing',
                'notes' => 'Planted in well-drained area'
            ],
        ];

        foreach ($crops as $crop) {
            if ($crop['farm_id']) {
                Crop::create($crop);
            }
        }
    }
}
