<?php

namespace Database\Seeders;

use App\Models\MarketLinkage;
use App\Models\Farm;
use App\Models\Crop;
use App\Models\Livestock;
use Illuminate\Database\Seeder;

class MarketLinkageSeeder extends Seeder
{
    public function run()
    {
        $greenValley = Farm::where('name', 'Green Valley Farm')->first();
        $goldenAcres = Farm::where('name', 'Golden Acres Livestock')->first();
        $sunrise = Farm::where('name', 'Sunrise Plantation')->first();

        $maize = Crop::where('name', 'Maize')->first();
        $poultry = Livestock::where('type', 'Poultry')->first();
        $soybean = Crop::where('name', 'Soybean')->first();

        $linkages = [
            [
                'farm_id' => $greenValley?->id,
                'buyer_name' => 'Nigerian Flour Mills',
                'contact_person' => 'Mr. James Ade',
                'contact_email' => 'james.ade@nfm.com',
                'contact_phone' => '08031112222',
                'product_type' => 'Maize',
                'product_id' => $maize?->id,
                'product_category' => 'Grains',
                'quantity' => 150.00,
                'unit' => 'bags',
                'price_per_unit' => 18000.00,
                'agreement_date' => '2025-08-01',
                'delivery_date' => '2025-09-25',
                'status' => 'confirmed',
                'notes' => 'Delivery to Kaduna factory'
            ],
            [
                'farm_id' => $goldenAcres?->id,
                'buyer_name' => 'Chikun Poultry',
                'contact_person' => 'Mrs. Bola Kareem',
                'contact_email' => 'bola.kareem@chikunpoultry.com',
                'contact_phone' => '08042223333',
                'product_type' => 'Poultry',
                'product_id' => $poultry?->id,
                'product_category' => 'Meat',
                'quantity' => 3000.00,
                'unit' => 'birds',
                'price_per_unit' => 2500.00,
                'agreement_date' => '2025-07-15',
                'delivery_date' => '2025-08-10',
                'status' => 'pending',
                'notes' => 'Live birds delivery'
            ],
            [
                'farm_id' => $sunrise?->id,
                'buyer_name' => 'Dangote Pasta',
                'contact_person' => 'Mr. Ahmed Musa',
                'contact_email' => 'ahmed.musa@dangote.com',
                'contact_phone' => '08053334444',
                'product_type' => 'Soybean',
                'product_id' => $soybean?->id,
                'product_category' => 'Grains',
                'quantity' => 80.00,
                'unit' => 'bags',
                'price_per_unit' => 22000.00,
                'agreement_date' => '2025-09-01',
                'delivery_date' => '2025-10-05',
                'status' => 'negotiation',
                'notes' => 'Minimum protein content 35%'
            ],
        ];

        foreach ($linkages as $linkage) {
            if ($linkage['farm_id'] && $linkage['product_id']) {
                MarketLinkage::create($linkage);
            }
        }
    }
}
