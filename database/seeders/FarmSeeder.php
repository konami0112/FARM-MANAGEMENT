<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    public function run()
    {
        // Fetch staff IDs dynamically by staff_id or email
        $manager1 = Staff::where('staff_id', 'FARM-001')->first();
        $manager2 = Staff::where('staff_id', 'FARM-002')->first();

        $farms = [
            [
                'name' => 'Green Valley Farm',
                'location' => 'Km 12, Abuja-Keffi Expressway',
                'size' => 120.50,
                'description' => 'Main crop production farm with irrigation facilities',
                'manager_id' => $manager1 ? $manager1->id : null,
                'is_active' => 1
            ],
            [
                'name' => 'Golden Acres Livestock',
                'location' => 'Off Airport Road, Lugbe',
                'size' => 85.25,
                'description' => 'Livestock farm specializing in poultry and cattle',
                'manager_id' => $manager2 ? $manager2->id : null,
                'is_active' => 1
            ],
            [
                'name' => 'Sunrise Plantation',
                'location' => 'Kubwa Extension',
                'size' => 200.00,
                'description' => 'Large-scale plantation for cash crops',
                'manager_id' => $manager1 ? $manager1->id : null,
                'is_active' => 1
            ],
            [
                'name' => 'Riverbend Farm',
                'location' => 'Along Gurara River',
                'size' => 65.75,
                'description' => 'Mixed farming with focus on organic produce',
                'manager_id' => $manager1 ? $manager1->id : 1, // fallback if you want to avoid null
                'is_active' => 0
            ],
        ];

        foreach ($farms as $farm) {
            // You can add a validation here to avoid inserting farms with null manager_id if column is NOT NULL
            if (is_null($farm['manager_id'])) {
                $farm['manager_id'] = 1; // default fallback ID
            }
            Farm::create($farm);
        }
    }
}
