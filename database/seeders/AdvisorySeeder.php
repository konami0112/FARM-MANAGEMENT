<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Staff;
use App\Models\Advisory;
use Illuminate\Database\Seeder;

class AdvisorySeeder extends Seeder
{
    public function run()
    {
        $greenValley = Farm::where('name', 'Green Valley Farm')->first();
        $goldenAcres = Farm::where('name', 'Golden Acres Livestock')->first();
        $sunrise = Farm::where('name', 'Sunrise Plantation')->first();

        $advisor = Staff::where('staff_id', 'FARM-005')->first(); // Michael Brown

        $advisories = [
            [
                'farm_id' => $greenValley?->id,
                'title' => 'Maize Pest Control',
                'content' => 'We have observed signs of fall armyworm in your maize field. Please apply Emamectin benzoate at recommended rates immediately.',
                'advisor_id' => $advisor?->id,
                'issue_date' => '2025-07-05',
                'due_date' => '2025-07-10',
                'priority' => 'high',
                'status' => 'pending',
                'response' => null
            ],
            [
                'farm_id' => $goldenAcres?->id,
                'title' => 'Poultry Vaccination',
                'content' => 'Your broilers are due for Newcastle disease vaccination. Please vaccinate all birds between 14-21 days of age.',
                'advisor_id' => $advisor?->id,
                'issue_date' => '2025-07-01',
                'due_date' => '2025-07-15',
                'priority' => 'medium',
                'status' => 'completed',
                'response' => 'Vaccination completed on 2025-07-08'
            ],
            [
                'farm_id' => $sunrise?->id,
                'title' => 'Soil Testing Recommendation',
                'content' => 'Soil test results indicate low phosphorus levels. Apply SSP fertilizer at 100kg/ha before next planting season.',
                'advisor_id' => $advisor?->id,
                'issue_date' => '2025-06-20',
                'due_date' => '2025-08-01',
                'priority' => 'medium',
                'status' => 'in-progress',
                'response' => 'Fertilizer ordered, awaiting delivery'
            ],
        ];

        foreach ($advisories as $advisory) {
            if ($advisory['farm_id'] && $advisory['advisor_id']) {
                Advisory::create($advisory);
            }
        }
    }
}
