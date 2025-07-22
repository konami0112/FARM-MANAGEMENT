<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    public function run()
    {
        $designations = [
            ['name' => 'Farm Administrator'],
            ['name' => 'Crop Supervisor'],
            ['name' => 'Livestock Manager'],
            ['name' => 'Field Agent'],
            ['name' => 'Financial Analyst'],
            ['name' => 'Market Linkage Officer'],
            ['name' => 'Agricultural Advisor'],
            ['name' => 'Data Entry Clerk'],
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
