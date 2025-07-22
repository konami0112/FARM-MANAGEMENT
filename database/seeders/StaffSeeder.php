<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $staffMembers = [
            [
                'staff_id' => 'FARM-001',
                'name' => 'John Oche',
                'email' => 'john.oche@farmma.test',
                'department_id' => 1,
                'designation_id' => 1,
                'type' => 'core',
                'password' => Hash::make('password123'),
                'status' => 'active',
                'phone' => '08012345678',
                'gender' => 'male',
                'employment_date' => '2020-01-15',
                'position' => 'Senior Farm Manager'
            ],
            [
                'staff_id' => 'FARM-002',
                'name' => 'Mary Johnson',
                'email' => 'mary.johnson@farmma.test',
                'department_id' => 2,
                'designation_id' => 3,
                'type' => 'core',
                'password' => Hash::make('password123'),
                'status' => 'active',
                'phone' => '08023456789',
                'gender' => 'female',
                'employment_date' => '2021-03-10',
                'position' => 'Livestock Supervisor'
            ],
            [
                'staff_id' => 'FARM-003',
                'name' => 'David Smith',
                'email' => 'david.smith@farmma.test',
                'department_id' => 6,
                'designation_id' => 5,
                'type' => 'core',
                'password' => Hash::make('password123'),
                'status' => 'active',
                'phone' => '08034567890',
                'gender' => 'male',
                'employment_date' => '2019-11-05',
                'position' => 'Finance Officer'
            ],
            [
                'staff_id' => 'FARM-004',
                'name' => 'Sarah Williams',
                'email' => 'sarah.williams@farmma.test',
                'department_id' => 7,
                'designation_id' => 6,
                'type' => 'support',
                'password' => Hash::make('password123'),
                'status' => 'active',
                'phone' => '08045678901',
                'gender' => 'female',
                'employment_date' => '2022-02-20',
                'position' => 'Marketing Executive'
            ],
            [
                'staff_id' => 'FARM-005',
                'name' => 'Michael Brown',
                'email' => 'michael.brown@farmma.test',
                'department_id' => 11,
                'designation_id' => 7,
                'type' => 'core',
                'password' => Hash::make('password123'),
                'status' => 'active',
                'phone' => '08056789012',
                'gender' => 'male',
                'employment_date' => '2020-07-15',
                'position' => 'Agricultural Advisor'
            ],
        ];

        foreach ($staffMembers as $staff) {
            Staff::create($staff);
        }
    }
}
