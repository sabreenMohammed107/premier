<?php

use Illuminate\Database\Seeder;

class PurchasingTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\PurchasingType::create([
            'id'=>100,
            'purchasing_types_name' => 'مستورد',
            'system_lockup' => 1
        ]);
        App\Models\PurchasingType::create([
            'id'=>101,
            'purchasing_types_name' => 'محلي',
            'system_lockup' => 1
        ]);
    }
}
