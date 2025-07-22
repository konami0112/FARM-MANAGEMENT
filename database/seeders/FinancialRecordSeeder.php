<?php

namespace Database\Seeders;

use App\Models\FinancialRecord;
use App\Models\Farm;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class FinancialRecordSeeder extends Seeder
{
    public function run()
    {
        $greenValley = Farm::where('name', 'Green Valley Farm')->first();
        $goldenAcres = Farm::where('name', 'Golden Acres Livestock')->first();
        $sunrise = Farm::where('name', 'Sunrise Plantation')->first();

        $recordedBy = Staff::where('staff_id', 'FARM-003')->first();

        if (!$recordedBy) return;

        $records = [
            [
                'farm_id' => $greenValley?->id,
                'transaction_type' => 'expense',
                'category' => 'Seeds',
                'amount' => 450000.00,
                'date' => '2025-06-10',
                'description' => 'Purchase of maize and rice seeds',
                'payment_method' => 'bank transfer',
                'reference' => 'INV-2025-001',
                'recorded_by' => $recordedBy->id
            ],
            [
                'farm_id' => $greenValley?->id,
                'transaction_type' => 'expense',
                'category' => 'Fertilizer',
                'amount' => 320000.00,
                'date' => '2025-06-15',
                'description' => 'NPK and Urea fertilizers',
                'payment_method' => 'bank transfer',
                'reference' => 'INV-2025-002',
                'recorded_by' => $recordedBy->id
            ],
            [
                'farm_id' => $goldenAcres?->id,
                'transaction_type' => 'expense',
                'category' => 'Livestock',
                'amount' => 1500000.00,
                'date' => '2025-06-01',
                'description' => 'Purchase of broiler chicks',
                'payment_method' => 'bank transfer',
                'reference' => 'INV-2025-003',
                'recorded_by' => $recordedBy->id
            ],
            [
                'farm_id' => $sunrise?->id,
                'transaction_type' => 'income',
                'category' => 'Crop Sales',
                'amount' => 2800000.00,
                'date' => '2025-05-20',
                'description' => 'Sale of last season maize',
                'payment_method' => 'bank transfer',
                'reference' => 'INV-2025-004',
                'recorded_by' => $recordedBy->id
            ],
            [
                'farm_id' => $goldenAcres?->id,
                'transaction_type' => 'income',
                'category' => 'Livestock Sales',
                'amount' => 1850000.00,
                'date' => '2025-05-15',
                'description' => 'Sale of processed broilers',
                'payment_method' => 'bank transfer',
                'reference' => 'INV-2025-005',
                'recorded_by' => $recordedBy->id
            ],
        ];

        foreach ($records as $record) {
            if ($record['farm_id']) {
                FinancialRecord::create($record);
            }
        }
    }
}
