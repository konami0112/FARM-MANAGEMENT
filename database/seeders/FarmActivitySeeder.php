<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Crop;
use App\Models\Livestock;
use App\Models\Staff;
use App\Models\FarmActivity;
use Illuminate\Database\Seeder;

class FarmActivitySeeder extends Seeder
{
    public function run()
    {
        $greenValley = Farm::where('name', 'Green Valley Farm')->first();
        $goldenAcres = Farm::where('name', 'Golden Acres Livestock')->first();
        $sunrise = Farm::where('name', 'Sunrise Plantation')->first();

        $maize = Crop::where('name', 'Maize')->first();
        $soybean = Crop::where('name', 'Soybean')->first();
        $broilers = Livestock::where('breed', 'Broilers')->first();

        $john = Staff::where('staff_id', 'FARM-001')->first(); // John Oche
        $mary = Staff::where('staff_id', 'FARM-002')->first(); // Mary Johnson

        $activities = [
            [
                'farm_id' => $greenValley?->id,
                'activity_type' => 'planting',
                'related_type' => 'crop',
                'related_id' => $maize?->id,
                'date' => '2025-06-15',
                'start_time' => '08:00:00',
                'end_time' => '16:00:00',
                'description' => 'Maize planting in section A',
                'assigned_to' => $john?->id,
                'status' => 'completed',
                'notes' => 'Used mechanical planter for efficiency'
            ],
            [
                'farm_id' => $greenValley?->id,
                'activity_type' => 'fertilizer_application',
                'related_type' => 'crop',
                'related_id' => $maize?->id,
                'date' => '2025-07-10',
                'start_time' => '07:30:00',
                'end_time' => '12:00:00',
                'description' => 'Top dressing of maize with urea',
                'assigned_to' => $john?->id,
                'status' => 'pending',
                'notes' => 'Need 10 bags of urea'
            ],
            [
                'farm_id' => $goldenAcres?->id,
                'activity_type' => 'feeding',
                'related_type' => 'livestock',
                'related_id' => $broilers?->id,
                'date' => '2025-07-05',
                'start_time' => '06:00:00',
                'end_time' => '06:30:00',
                'description' => 'Morning feeding of broilers',
                'assigned_to' => $mary?->id,
                'status' => 'completed',
                'notes' => 'Feed consumption normal'
            ],
            [
                'farm_id' => $goldenAcres?->id,
                'activity_type' => 'vaccination',
                'related_type' => 'livestock',
                'related_id' => $broilers?->id,
                'date' => '2025-07-08',
                'start_time' => '09:00:00',
                'end_time' => '11:00:00',
                'description' => 'Newcastle disease vaccination',
                'assigned_to' => $mary?->id,
                'status' => 'completed',
                'notes' => 'All birds vaccinated successfully'
            ],
            [
                'farm_id' => $sunrise?->id,
                'activity_type' => 'harvesting',
                'related_type' => 'crop',
                'related_id' => $soybean?->id,
                'date' => '2025-09-25',
                'start_time' => '07:00:00',
                'end_time' => '17:00:00',
                'description' => 'Soybean harvest in section C',
                'assigned_to' => $john?->id,
                'status' => 'pending',
                'notes' => 'Need 15 laborers for harvest'
            ],
        ];

        foreach ($activities as $activity) {
            if ($activity['farm_id'] && $activity['related_id'] && $activity['assigned_to']) {
                FarmActivity::create($activity);
            }
        }
    }
}

