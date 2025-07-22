<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            ['name' => 'Crop Production', 'code' => 'CRP', 'type' => 'core', 'status' => 'active'],
            ['name' => 'Livestock Management', 'code' => 'LVM', 'type' => 'support', 'status' => 'active'],
            ['name' => 'Irrigation & Water Systems', 'code' => 'IRR', 'type' => 'support', 'status' => 'active'],
            ['name' => 'Farm Equipment & Maintenance', 'code' => 'EQM', 'type' => 'core', 'status' => 'active'],
            ['name' => 'Information Technology', 'code' => 'IT', 'type' => 'support', 'status' => 'active'],
            ['name' => 'Finance & Accounting', 'code' => 'FIN', 'type' => 'core', 'status' => 'active'],
            ['name' => 'Marketing & Sales', 'code' => 'MKT', 'type' => 'support', 'status' => 'active'],
            ['name' => 'Research & Development', 'code' => 'RND', 'type' => 'support', 'status' => 'active'],
            ['name' => 'Security & Surveillance', 'code' => 'SEC', 'type' => 'core', 'status' => 'active'],
            ['name' => 'Human Resources', 'code' => 'HR', 'type' => 'support', 'status' => 'active'],
            ['name' => 'Advisory & Extension Services', 'code' => 'ADV', 'type' => 'core', 'status' => 'active'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
